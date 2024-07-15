<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Str;
use PDO;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('login-user' , ['theme_mode' => session('theme_mode') ?? 'light']);
    }


     // My code starts ***
    public function redirectToProvider(){

           return Socialite::driver('github')->redirect();

        }



    // For handling github callback
    public function handleProviderCallback(){

            $github_user = Socialite::driver('github')->user();



            // Logging informations about the process to the storage/logs/laravel.log file
            DB::listen(function ($query) {
                Log::info($query->sql, $query->bindings);
            });



            // *** Laravel DB method didn't work, thus I had to use PDO ***
              // Database configuration
            $host = env('DB_HOST', '127.0.0.1');
            $db = env('DB_DATABASE', 'personality_register');
            $user = env('DB_USERNAME', 'root');
            $pass = env('DB_PASSWORD', '');
            // $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                // Create a new PDO instance
                $pdo = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                // Handle connection error
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }

            // User email to check
            $userEmail = $github_user->email;

            // Prepare the SQL statement to check if user exists
            $sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';
            $stmt = $pdo->prepare($sql);

            // Bind the email parameter
            $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);

            // Execute the query
            $stmt->execute();

            // Fetch the result
            $existing_user_check = $stmt->fetch();

            if ($existing_user_check) {

                // User exists, now log In the user using github_user id
                // Log in the user using the id
                Auth::loginUsingId($existing_user_check['id'], true);

                // Redirecting To Home Page
                return redirect('/');

            }
            // ======================



    // Identifing or creating user
    $user = User::firstOrCreate([
                'github_id' => $github_user->id,
            ],

            [
                'name' => $github_user->name,
                'email' => $github_user->email,
                'password' => bcrypt(Str::random(24)),
                'github_avatar'=> $github_user->avatar,
            ]);

            // Logging in the user
            Auth::login($user, true);

            // Redirecting the user to input personality type value
            return redirect('/personality_setup');
        }



    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
       // Deleting the user from database
        // DB::delete('DELETE FROM users where id = ?', [Auth::user()->id]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();



        // Destroying the session
        session_start();

        $_SESSION = [];

        session_destroy();


        return redirect('/');
    }
}
