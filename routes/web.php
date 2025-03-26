<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return View('welcome');
});

//schedule links
Route::name("schedules.")->group(function(){
    Route::prefix("schedules")->group(function(){        
        Route::get('/',                      [ScheduleController::class, 'index'      ])->name('index');
        Route::get('/create',                [ScheduleController::class, 'create'     ])->name('create');
        Route::post('/',                     [ScheduleController::class, 'store'      ])->name('store');
        Route::get('/{id}',                      [ScheduleController::class, 'show'       ])->name('show');
        Route::get('/edit/{id}',             [ScheduleController::class, 'edit'       ])->name('edit');
        Route::post('/update/{id}',          [ScheduleController::class, 'update'     ])->name('update');
        Route::delete('/{id}/destroy',       [ScheduleController::class, 'destroy'    ])->name('destroy');
    });
});
