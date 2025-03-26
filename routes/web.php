<?php

use App\Http\Controllers\VaccinationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


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

// require __DIR__.'/auth.php';