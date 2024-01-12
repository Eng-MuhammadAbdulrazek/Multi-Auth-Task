<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::prefix('en')->middleware(['SetLocale:en'])->group(function () {
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        });
        Route::resource('/users', UserController::class);
        Route::get('users/datatables', [RoleController::class, 'datatables'])->name('users.datatables');
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/give_role', [RoleController::class, 'AssignRoleToUser'])->name('roles.give_role');
        Route::resource('/permissions', PermissionController::class);
});
});
Route::prefix('ar')->middleware(['SetLocale:ar'])->group(function () {
    Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    
            Route::get('/', function () {
                return view('admin.index');
            });
            Route::resource('/users', UserController::class);
            Route::get('users/datatables', [RoleController::class, 'datatables'])->name('users.datatables');
            Route::resource('/roles', RoleController::class);
            Route::post('/roles/give_role', [RoleController::class, 'AssignRoleToUser'])->name('roles.give_role');
            Route::resource('/permissions', PermissionController::class);
    });
    });