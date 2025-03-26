<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VaccinationController;
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

//schedule links
Route::name("schedules.")->group(function(){
    Route::prefix("schedules")->group(function(){        
        Route::get('/',                      [ScheduleController::class, 'index'      ])->name('index');
        Route::get('/create',                [ScheduleController::class, 'create'     ])->name('create');
        Route::post('/',                     [ScheduleController::class, 'store'      ])->name('store');
        Route::get('/{id}',                  [ScheduleController::class, 'show'       ])->name('show');
        Route::get('/edit/{id}',             [ScheduleController::class, 'edit'       ])->name('edit');
        Route::post('/update/{id}',          [ScheduleController::class, 'update'     ])->name('update');
        Route::delete('/{id}/destroy',       [ScheduleController::class, 'destroy'    ])->name('destroy');
    });
});

# VACCINATIONS ROUTES
Route::prefix('vaccinations')->group(function () {
    // Reminders
    Route::get('/reminders',            [VaccinationController::class, 'reminders'])->name('vaccinations.reminders');
    Route::get('/',                     [VaccinationController::class, 'index'])->name('vaccinations.index');
    Route::get('/create',               [VaccinationController::class, 'create'])->name('vaccinations.create');
    Route::post('/',                    [VaccinationController::class, 'store'])->name('vaccinations.store');
    Route::get('/{vaccination}',        [VaccinationController::class, 'show'])->name('vaccinations.show');
    Route::get('/{vaccination}/edit',   [VaccinationController::class, 'edit'])->name('vaccinations.edit');
    Route::put('/{vaccination}',        [VaccinationController::class, 'update'])->name('vaccinations.update');
    Route::delete('/{vaccination}',     [VaccinationController::class, 'destroy'])->name('vaccinations.destroy');

    // Patient-specific routes
    Route::get('/patient/{patient}',             [VaccinationController::class, 'patientHistory'])->name('vaccinations.patient.history');
    Route::get('/patient/{patient}/schedule',    [VaccinationController::class, 'upcomingVaccines'])->name('vaccinations.patient.schedule');
    Route::get('/patient/{patient}/certificate', [VaccinationController::class, 'showCertificate'])->name('vaccinations.patient.certificate');
});

require __DIR__.'/auth.php';