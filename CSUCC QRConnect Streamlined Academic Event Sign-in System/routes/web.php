<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return 'welcome';
})->name('home');

//admin routes
Route::resource('attendees', AttendeeController::class)->only([
    'create',
    'store',
    'show'
]);


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

Route::get('login', function () {
    return redirect()->route('auth.create');
})->name('login'); //alias for log-in route


//!group of protected  admin(with user account) routes, needs authentication
Route::middleware('auth')->group(function () {
    Route::get('admins', [AdminController::class, 'index'])
        ->name('admins.index'); //homepage for admins that are authenticated

    Route::delete('auth', [AuthController::class, 'destroy'])
        ->name('auth.destroy'); //handle log-outs, route
});

//!Forgot password and reset password routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('forgot.password.post');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])
    ->name('reset.password');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])
    ->name('reset.password.post');




Route::middleware('auth')->group(function () {
    //Event routes
    Route::resource("events", EventController::class);
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
});


// Route for scanning QR code
Route::get('/scan', function () {
    return view('qrScanner.scan_qr_code');
});

Route::post('/scan', function (Request $request) {
    $data = $request->input('data');
    // Process the scanned data (e.g., save to database)
    return response()->json(['success' => true]);
})->name('process-scanned-data');