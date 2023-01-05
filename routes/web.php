<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store', [AuthController::class, 'validateUser'])->name('auth.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::controller(HouseholdController::class)->group(function () {
        Route::group([
            'prefix' => 'household'
        ], function () {
            Route::get('/', 'index')->name('household.index');
            Route::get('/create', 'create')->name('household.create');
            Route::post('/store', 'store')->name('household.store');
            Route::get('/edit/{household}', 'edit')->name('household.edit');
            Route::get('/show/{household}', 'show')->name('household.show');
            Route::put('/update/{id}', 'update')->name('household.update');
            Route::get('autocomplete', 'autocomplete')->name('autocomplete');
        });
    });

    Route::controller(ResidentController::class)->group(function () {
        Route::group([
            'prefix' => 'resident'
        ], function () {
            Route::get('/', 'index')->name('resident.index');
            // Route::get('/create', 'create')->name('resident.create');
            // Route::post('/store', 'store')->name('resident.store');
            Route::get('/edit/{id}', 'edit')->name('resident.edit');
            Route::get('/show/{id}', 'show')->name('resident.show');
            Route::put('/update/{id}', 'update')->name('resident.update');
        });
    });

    Route::controller(ReportController::class)->group(function () {
        Route::group([
            'prefix' => 'report'
        ], function () {
            Route::get('/', 'index')->name('report.index'); 
        });
    });
}); 
