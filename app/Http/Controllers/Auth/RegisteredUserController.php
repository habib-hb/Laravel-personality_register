<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{


public function create(): View
    {
        return view('register-user' , ['theme_mode' => session('theme_mode') ?? 'light']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'personality' => ['required', 'numeric'],//my code ***
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        DB::insert('INSERT INTO personality_type_store (user_id, personality_type_identifier_int) VALUES (?, ?)', [$user->id, intval($request->personality)]); // *** note: An error should be programmed for case when intval = 0 in the case of non numeric values.***

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));// Route changed from 'dashboard' to 'home' ***
    }
}
