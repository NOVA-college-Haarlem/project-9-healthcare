<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\ScheduleController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplyRequestController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\InsuranceController;
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
Route::name("schedules.")->group(function () {
    Route::prefix("schedules")->group(function () {
        Route::get('/',                      [ScheduleController::class, 'index'])->name('index');
        Route::get('/create',                [ScheduleController::class, 'create'])->name('create');
        Route::post('/',                     [ScheduleController::class, 'store'])->name('store');
        Route::get('/{id}',                  [ScheduleController::class, 'show'])->name('show');
        Route::get('/edit/{id}',             [ScheduleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',          [ScheduleController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy',       [ScheduleController::class, 'destroy'])->name('destroy');
    });
});


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

    Route::get('/reminders', [VaccinationController::class, 'reminders'])->name('vaccinations.reminders');
    Route::get('/', [VaccinationController::class, 'index'])->name('vaccinations.index');
    Route::get('/create', [VaccinationController::class, 'create'])->name('vaccinations.create');
    Route::post('/', [VaccinationController::class, 'store'])->name('vaccinations.store');
    Route::get('/{vaccination}', [VaccinationController::class, 'show'])->name('vaccinations.show');
    Route::get('/{vaccination}/edit', [VaccinationController::class, 'edit'])->name('vaccinations.edit');
    Route::put('/{vaccination}', [VaccinationController::class, 'update'])->name('vaccinations.update');
    Route::delete('/{vaccination}', [VaccinationController::class, 'destroy'])->name('vaccinations.destroy');


    // Patient-specific routes
    Route::get('/patient/{patient}',             [VaccinationController::class, 'patientHistory'])->name('vaccinations.patient.history');
    Route::get('/patient/{patient}/schedule',    [VaccinationController::class, 'upcomingVaccines'])->name('vaccinations.patient.schedule');
    Route::get('/patient/{patient}/certificate', [VaccinationController::class, 'showCertificate'])->name('vaccinations.patient.certificate');
});


Route::resource('lab-results', LabResultController::class);


//inventory links
Route::name("inventory_items.")->group(function () {
    Route::prefix("inventory_items")->group(function () {
        Route::get('/',                      [InventoryItemController::class, 'index'])->name('index');
        Route::get('/create',                [InventoryItemController::class, 'create'])->name('create');
        Route::post('/',                     [InventoryItemController::class, 'store'])->name('store');
        Route::get('/{id}',                  [InventoryItemController::class, 'show'])->name('show');
        Route::get('/edit/{id}',             [InventoryItemController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',          [InventoryItemController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy',       [InventoryItemController::class, 'destroy'])->name('destroy');
    });
});

//inventory links
Route::name("supplies.")->group(function () {
    Route::prefix("supplies")->group(function () {
        Route::get('/',                      [SupplyRequestController::class, 'index'])->name('index');
        Route::delete('/{id}/destroy',       [SupplyRequestController::class, 'destroy'])->name('destroy');
        Route::delete('/{id}/approve',       [SupplyRequestController::class, 'approve'])->name('approve');
    });
});

// Billing routes
Route::prefix('bills')->group(function () {
    Route::get('/', [BillingController::class, 'index'])->name('bills.index');
    Route::get('/create', [BillingController::class, 'create'])->name('bills.create');
    Route::post('/', [BillingController::class, 'store'])->name('bills.store');
    Route::get('/{bill}', [BillingController::class, 'show'])->name('bills.show');
    Route::get('/{bill}/edit', [BillingController::class, 'edit'])->name('bills.edit');
    Route::put('/{bill}', [BillingController::class, 'update'])->name('bills.update');
    Route::delete('/{bill}', [BillingController::class, 'destroy'])->name('bills.destroy');
    Route::post('/{bill}/payment', [BillingController::class, 'processPayment'])->name('bills.payment');
    Route::post('/{bill}/insurance-payment', [BillingController::class, 'processInsurancePayment'])->name('bills.insurance-payment');
    Route::get('/report', [BillingController::class, 'generateReport'])->name('bills.report');
    Route::get('/patient/{patient}/insurances', [BillingController::class, 'getPatientInsurances'])->name('bills.patient.insurances');
});

// Insurance routes
Route::prefix('insurance')->group(function () {
    Route::get('/', [InsuranceController::class, 'index'])->name('insurance.index');
    Route::get('/create', [InsuranceController::class, 'create'])->name('insurance.create');
    Route::post('/', [InsuranceController::class, 'store'])->name('insurance.store');
    Route::get('/{insurance}', [InsuranceController::class, 'show'])->name('insurance.show');
    Route::get('/{insurance}/edit', [InsuranceController::class, 'edit'])->name('insurance.edit');
    Route::put('/{insurance}', [InsuranceController::class, 'update'])->name('insurance.update');
    Route::delete('/{insurance}', [InsuranceController::class, 'destroy'])->name('insurance.destroy');
});

require __DIR__ . '/auth.php';
// require __DIR__.'/auth.php';
