<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;


Route::redirect('/', '/en');
Auth::routes();

// English Locale
Route::prefix('en')->middleware(['SetLocale:en'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/client', [App\Http\Controllers\ClientDashboardController::class, 'index'])
            ->middleware('role:client');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// Arabic Locale
Route::prefix('ar')->middleware(['SetLocale:ar'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/client', [App\Http\Controllers\ClientDashboardController::class, 'index'])
            ->middleware('role:client');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});
