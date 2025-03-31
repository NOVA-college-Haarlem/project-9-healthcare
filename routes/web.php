<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\LabResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Patient routes
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index'); // View appointments
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create'); // Schedule appointment
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store'); // Save appointment

// Doctor routes
Route::get('/appointments/manage', [AppointmentController::class, 'manage'])->name('appointments.manage'); // Calendar view for managing appointments
Route::get('/appointments/calendar-events', [AppointmentController::class, 'calendarEvents'])->name('appointments.calendar-events'); // Get calendar events
Route::get('/appointments/date/{date}', [AppointmentController::class, 'getAppointmentsByDate'])->name('appointments.by-date'); // Get appointments by date
Route::post('/appointments/{appointment}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve'); // Approve appointment
Route::post('/appointments/{appointment}/reschedule', [AppointmentController::class, 'reschedule'])->name('appointments.reschedule'); // Reschedule appointment
Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel'); // Cancel appointment






# VACCINATIONS ROUTES
Route::prefix('vaccinations')->group(function () {
    // Reminders
    Route::get('/reminders', [VaccinationController::class, 'reminders'])->name('vaccinations.reminders');
    Route::get('/', [VaccinationController::class, 'index'])->name('vaccinations.index');
    Route::get('/create', [VaccinationController::class, 'create'])->name('vaccinations.create');
    Route::post('/', [VaccinationController::class, 'store'])->name('vaccinations.store');
    Route::get('/{vaccination}', [VaccinationController::class, 'show'])->name('vaccinations.show');
    Route::get('/{vaccination}/edit', [VaccinationController::class, 'edit'])->name('vaccinations.edit');
    Route::put('/{vaccination}', [VaccinationController::class, 'update'])->name('vaccinations.update');
    Route::delete('/{vaccination}', [VaccinationController::class, 'destroy'])->name('vaccinations.destroy');

    // Patient-specific routes
    Route::get('/patient/{patient}', [VaccinationController::class, 'patientHistory'])->name('vaccinations.patient.history');
    Route::get('/patient/{patient}/schedule', [VaccinationController::class, 'upcomingVaccines'])->name('vaccinations.patient.schedule');
    Route::get('/patient/{patient}/certificate', [VaccinationController::class, 'showCertificate'])->name('vaccinations.patient.certificate');
});

Route::resource('lab-results', LabResultController::class);

// require __DIR__.'/auth.php';



require __DIR__ . '/auth.php';
