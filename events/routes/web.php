<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function(){
//     return view('events.index');
// });
Route::resource('events', \App\Http\Controllers\EventController::class);
Route::resource('attend', App\Http\Controllers\AttendeeController::class);


Route::post('/events/storeAttendee', [EventController::class, 'storeAttendee'])->name('events.storeAttendee');
Route::delete('events/attendee/{id}', [EventController::class, 'destroyAttendee'])->name('events.destroyParticipant');
Route::post('events/show', [EventController::class, 'updateAttendee'])->name('events.updateAttendee');