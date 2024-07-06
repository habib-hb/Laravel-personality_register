<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TreasureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;



Route::get('/', [HomeController::class, 'create'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/treasure' , [TreasureController::class , 'create'])->middleware(['auth', 'verified'])->name('treasure');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Github Section
Route::get('/auth/redirect', [AuthenticatedSessionController::class, 'redirectToProvider']);

Route::get('/auth/callback', [AuthenticatedSessionController::class, 'handleProviderCallback']);

Route::get('/personality_setup' , function () {
    return view('github_personality_setup');
})->name('personality_setup');

Route::post('/personality_setup' , function (Request $request) {
       $user_id = Auth::user()->id;

    // Inserting Into personality type store
    DB::insert('INSERT INTO personality_type_store (user_id , personality_type_identifier_int) VALUES (?, ?)' , [$user_id , intval($request->personality)]);

    // Redirecting to the home page
    return redirect(route('home'));


});


Route::get('/get_user_name', function(){

    // Getting the image path
    $image_path = public_path('images/picture.png');

    // Sending the image as response
    return response()->file($image_path);

});



require __DIR__.'/auth.php';
