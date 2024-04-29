<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventAttendeeController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\EnsureEventIndexShowRoute;
use App\Http\Middleware\EnsureEventShowRoute;
use App\Http\Middleware\EnsureResetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//!Attendee routes
Route::resource('attendees', AttendeeController::class)->only([
    'create',
    'store',
    'show'
]);
Route::get('/attendees', function () {
    return redirect()->route('attendees.create');
})->name('generate-qr');


//!handle new admin creation
Route::resource("admins", AdminController::class)->only([
    'create',
    'store'
]);

Route::get('signup', function () {
    return redirect()->route('admins.create');
})->name('signup'); //alias route for admin signup route

Route::post('admins', [AdminController::class, 'store'])
    ->name('admins.store'); //handle storing new admin acc

//!authenticaion for admins routes
Route::resource("auth", AuthController::class)->only([
    'create',
    'store',
]);
Route::get('/auth', function () {
    return redirect()->route('auth.create');
})->name('admins.login'); //handle storing new admin acc


Route::get('login', function () {
    return redirect()->route('auth.create');
})->name('login'); //alias for log-in route

//!Forgot password and reset password routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('forgot.password.post');

Route::post('reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])
    ->name('reset-password.post')
    ->middleware(EnsureResetPassword::class);

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])
    ->name('reset-password')
    ->middleware(EnsureResetPassword::class);

Route::get('/reset-password', function () {
    return redirect()->route('forgot.password');
})->name('reset.password');

//!group of protected  routes, needs authentication
Route::middleware('auth')->group(function () {

    //!admin routes
    Route::get('admins', [AdminController::class, 'index'])
        ->name('admins.index'); //homepage for admins that are authenticated

    Route::delete('auth', [AuthController::class, 'destroy'])
        ->name('auth.destroy'); //handle log-outs, route

    //!Event routes
    Route::resource("events", EventController::class);

    Route::get('events/create', [EventController::class, 'create'])->name('events.create');

    Route::resource("event-attendees", EventAttendeeController::class);

    Route::resource("event-attendees", EventAttendeeController::class)->only(['create', 'index'])
        ->middleware(EnsureEventShowRoute::class); //middle ware that ensure that the qr scanner and show attendance record routes is access only through the event.show route
});

