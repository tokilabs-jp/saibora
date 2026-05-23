<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::view('users', 'admin.users.index')->name('users.index');
        Route::get('role-permission-matrix', \App\Http\Controllers\Admin\RoleController::class)->name('roles.index');
    });
});

Route::middleware(['guest', 'local-only'])->group(function () {
    Route::post('/local-login', \App\Http\Controllers\Development\LocalLoginController::class)->name('local-login');
});

require __DIR__.'/settings.php';
