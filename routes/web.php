<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    $personality = "Router Variable";
    return view('home' , ['personality' => $personality]);
})->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/register-user', function(){
    return view('register-user');
});



Route::get('/login-user', function(){
    return view('login-user');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// *** V1 ***
// Route::get('/auth/redirect', function(){
//         return Socialite::driver('github')->redirect();
// });
// Route::get('/auth/callback', function(){
//     $user = Socialite::driver('github')->user();

//     dd($user);
// });



Route::get('/auth/redirect', [AuthenticatedSessionController::class, 'redirectToProvider']);
Route::get('/auth/callback', [AuthenticatedSessionController::class, 'handleProviderCallback']);



require __DIR__.'/auth.php';
