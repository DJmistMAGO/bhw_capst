<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\ResidentController;




// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/store', [AuthController::class, 'validateUser'])->name('auth.store');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/', [MainController::class, 'home'])->name('home');
//     Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
// });


Route::controller(DashboardController::class)->group(function () {
    Route::group([
        'prefix' => 'dashboard'
    ], function () {
        Route::get('/', 'index')->name('dashboard'); 
    });
});

Route::controller(HouseholdController::class)->group(function () {
    Route::group([
        'prefix' => 'household'
    ], function () {
        Route::get('/', 'index')->name('household.index');
        Route::get('/create', 'create')->name('household.create');
        Route::post('/store', 'store')->name('household.store');
        Route::get('/edit/{id}', 'edit')->name('household.edit');
        Route::get('/show/{id}', 'show')->name('household.show');
        Route::put('/update/{id}', 'update')->name('household.update');
    });
    
});