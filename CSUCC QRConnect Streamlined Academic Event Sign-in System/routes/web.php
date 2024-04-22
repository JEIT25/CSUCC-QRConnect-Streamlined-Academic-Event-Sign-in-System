<?php
use App\Http\Controllers\AttendeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'welcome';
});


Route::resource('attendees', AttendeeController::class);

