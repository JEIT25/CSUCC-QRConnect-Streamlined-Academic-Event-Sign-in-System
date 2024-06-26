<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventAttendeeController;
use App\Http\Controllers\EventController;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//!Attendee routes
Route::get('/attendees', function () {
    return redirect()->route('attendees.create');
})->name('generate-qr');

route::get('/attendees/events-list/{id}', function ($id) {
    $event = Event::findOrFail($id);
    return view('attendees.showEvent', ['event' => $event]);
})->name('attendees.show.event');

route::get('/attendees/events-list', function () {
    $startDate = Carbon::now(); // or any specific start date you want to filter events from

    // Retrieve all events where the start date time is greater than or equal to the specified start date
    $events = Event::where('start_date_time', '>=', $startDate)
        ->paginate(10);
    // Pass the $events variable to the view
    return view('attendees.events')->with(['events' => $events]);//! FIX THIS ERROR LATER
})->name('attendees.events.list');

Route::get('attendees/retrieve-qr', [AttendeeController::class, 'retrieveQRForm'])
    ->name('attendees.retrieveQR');

Route::post('attendees/retrieve-qr', [AttendeeController::class, 'retrieveQR'])
    ->name('attendees.retrieveQR.post');

Route::resource('attendees', AttendeeController::class)->only([
    'create',
    'store',
    'show',
    'events',
]);


//!handle new admin creation
Route::resource("admins", AdminController::class)->only([
    'create',
    'store',
]);

Route::get('signup', function () {
    return redirect()->route('admins.create');
})->name('signup'); //alias route for admin signup route

Route::post('admins', [AdminController::class, 'store'])
    ->name('admins.store'); //handle storing new admin acc


//! authenticaion for admins routes
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

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])
    ->name('reset-password');

Route::post('reset-password', [ForgotPasswordController::class, 'resetPasswordPost'])
    ->name('reset-password.post');

//!group of protected  routes, needs authentication
Route::middleware('auth')->group(function () {

    //!admin routes
    Route::get('admins', [AdminController::class, 'index'])
        ->name('admins.index'); //homepage for admins that are authenticated

    //show admin profile route
    Route::get('admins/show', [AdminController::class, 'show'])
        ->name('admins.show');

    Route::delete('auth', [AuthController::class, 'destroy'])
        ->name('auth.destroy'); //handle log-outs, route

    //export attendance records route
    Route::get('event-attendees/export-attendance-pdf/{event_id}/{event_name}', [EventAttendeeController::class, 'exportAttendancePdf'])->name('event-attendee.exportPdf');

    //!Event routes
    Route::resource("events", EventController::class);


    Route::get('event-attendees', [EventController::class, 'create']);


    //route for create check in record
    Route::get('event-attendees/checkin', [EventAttendeeController::class, 'createCheckIn'])->name('event-attendees.checkin');
    //route for create check out record
    Route::get('event-attendees/checkout', [EventAttendeeController::class, 'createCheckOut'])->name('event-attendees.checkout');

    // Route for checking in an attendee
    Route::post('event-attendees/checkin', [EventAttendeeController::class, 'checkIn',])->name('event-attendees.checkin');

    // Route for checking out an attendee
    Route::post('event-attendees/checkout', [EventAttendeeController::class, 'checkOut'])->name('event-attendees.checkout');

    Route::resource("event-attendees", EventAttendeeController::class)->only(['index', 'destroy']);
});

