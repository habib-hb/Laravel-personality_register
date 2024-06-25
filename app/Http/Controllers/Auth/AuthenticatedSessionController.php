<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Str;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */



     // My code starts ***
        public function redirectToProvider(){
           return Socialite::driver('github')->redirect();
        }



        // For handling github callback
        public function handleProviderCallback(){
            $github_user = Socialite::driver('github')->user();

            

            $user = User::firstOrCreate([
                'github_id' => $github_user->id,
            ], [
                'name' => $github_user->getName(),
                'email' => $github_user->getEmail(),
                'password' => bcrypt(Str::random(24)),
            ]);

            Auth::login($user, true);

            return redirect('/');
        }



    public function create(): View
    {
        return view('auth.login');
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
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
