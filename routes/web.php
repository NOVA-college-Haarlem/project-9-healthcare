<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Patient routes
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index'); // View appointments
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create'); // Schedule appointment
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store'); // Save appointment

// Doctor routes
Route::get('/appointments/manage', [AppointmentController::class, 'manage'])->name('appointments.manage'); // Manage appointments
Route::post('/appointments/{appointment}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve'); // Approve appointment
Route::post('/appointments/{appointment}/reschedule', [AppointmentController::class, 'reschedule'])->name('appointments.reschedule'); // Reschedule appointment
Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel'); // Cancel appointment
