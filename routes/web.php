<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TreasureController;
use App\Mail\Hahamail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;



Route::get('/', [HomeController::class, 'create'])->name('home');



Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/treasure' , [TreasureController::class , 'create'])->middleware(['auth'])->name('treasure');



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



// Email Varification Stuffs
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



// Sending Mail stuffs
Route::get('send_mail', function () {
    $details = [
        'title' => 'Success',
        'content' => 'This is an email testing using Laravel-Brevo',
    ];

    try {
        Mail::raw('This is a test email using Brevo SMTP.', function (Message $message) {
            $message->from('habib@valueadderhabib.com', 'Habibur Rahman');
            $message->to('developerhabib1230@gmail.com');
            $message->subject('Test Email');
        });

        return 'Email sent at ' . now();
    } catch (\Exception $e) {
        return 'Email sending failed: ' . $e->getMessage();
    }
});



// Input into quotes database - route setup
Route::get('/input_quotes' , function () {

    return view('database_input.quotes' , ['theme_mode' => session('theme_mode') ?? 'light']);

})->name('input_quotes');



// Set Theme Mode
Route::post('/set_theme_mode' , function (Request $request) {
    // Setting Session for theme mode
    $request->session()->put('theme_mode' , $request->theme_mode);

    return response()->json(['message' => 'Theme mode set successfully!']);
})->name('set_theme_mode');



// Change personality Setup
Route::get('/change_personality' , function () {
    return view('database_input.change_personality');
})->name('change_personality')->middleware('auth');

Route::post('/change_personality' , function (Request $request) {
    $user_id = Auth::user()->id;

    // Updating the exisiting personality type store
    DB::update('UPDATE personality_type_store SET personality_type_identifier_int = ? WHERE user_id = ?', [intval($request->personality) , $user_id]);

    // Redirecting to the home page
    return redirect(route('home'));
});



// About Page
Route::get('/about' , function () {
    return view('about', ['theme_mode' => session('theme_mode') ?? 'light']);
})->name('about');



// Feedback message
Route::post('feedback', function(Request $request) {
    $data = $request->validate([
        'feedback' => 'required',
    ]);
    $data['created_at'] = date('Y-m-d H:i:s');

    if (Auth::check()) {
        $data['user_id'] = Auth::user()->id;
    }

    if(Auth::check()) {
    DB::insert('INSERT INTO feedback_message (user_id ,feedback, created_at) VALUES (?,?,?)' , [$data['user_id'] ?? null , $data['feedback'] , $data['created_at']]);
    } else {
        DB::insert('INSERT INTO feedback_message (feedback, created_at) VALUES (?,?)' , [$data['feedback'] , $data['created_at']]);
    }

    // Return redirect back
    return redirect()->back();

})->name('feedback');



require __DIR__.'/auth.php';
