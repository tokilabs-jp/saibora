<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');


    Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
        Route::view('dashboard', 'client.dashboard')->name('dashboard');
    });

    Route::group(['prefix' => 'volunteer', 'as' => 'volunteer.'], function () {
        Route::view('dashboard', 'volunteer.dashboard')->name('dashboard');
    });

    Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
        Route::view('dashboard', 'staff.dashboard')->name('dashboard');
    });

    Route::group(['prefix' => 'system-admin', 'as' => 'system_admin.'], function () {
        Route::view('dashboard', 'system_admin.dashboard')->name('dashboard');
        Route::view('users', 'system_admin.users.index')->middleware(['permission:'.\App\Enums\UserPermission::VIEW_ANY_USER->value])->name('users.index');
        Route::get('role-permission-matrix', \App\Http\Controllers\Admin\RoleController::class)->name('roles.index');
    });
});

Route::middleware(['guest', 'local-only'])->group(function () {
    Route::post('/local-login', \App\Http\Controllers\Development\LocalLoginController::class)->name('local-login');
});

require __DIR__.'/settings.php';
