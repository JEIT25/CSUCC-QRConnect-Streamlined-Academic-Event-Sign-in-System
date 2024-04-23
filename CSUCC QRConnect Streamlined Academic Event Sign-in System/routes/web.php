<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return 'welcome';
})->name('home');

//admin routes
Route::resource('attendees', AttendeeController::class);

Route::post('attendees', [AttendeeController::class, 'create'])
    ->name('attendees.create');

Route::post('attendees', [AttendeeController::class, 'store'])
    ->name('admins.store');

Route::get('attendees', [AttendeeController::class, 'show'])
    ->name('attendees.show');

//handle new admin creation
Route::resource("admins", AdminController::class);
Route::get('admins', [AdminController::class, 'create'])
    ->name('admins.create'); //admin sign-up route

Route::get('signup', function () {
    return redirect()->route('admins.create');
})->name('signup'); //alias route for admin signup route

Route::post('admins', [AdminController::class, 'store'])
    ->name('admins.store'); //handle storing new admin acc

//authenticaion for admins routes
Route::resource("auth", AuthController::class);

Route::get('auth', [AuthController::class, 'create'])
    ->name('auth.create'); //log-in route

Route::get('login', function () {
    return redirect()->route('auth.create');
})->name('login'); //alias for log-in route

Route::post('auth', [AuthController::class, 'store'])
    ->name('auth.store'); //handle log-ins, route

//group of protected  admin(with user account) routes, needs authentication
Route::middleware('auth')->group(function () {
    Route::get('admins', [AdminController::class, 'index']); //homepage for admins that are authenticated

    Route::delete('auth', [AuthController::class, 'destroy'])
        ->name('auth.destroy'); //handle log-outs, route
})->name('admins.index');


Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('forgot.password.post');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])
    ->name('reset.password');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])
    ->name('reset.password.post');


// Route::get('/forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('password.requestform');
// Route::post('/forgot-password', 'ForgotPasswordController@sendResetLinkEmail')->name('password.requestform');


