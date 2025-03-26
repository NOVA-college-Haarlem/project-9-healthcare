<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
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


require __DIR__.'/auth.php';
