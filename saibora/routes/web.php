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

require __DIR__.'/settings.php';
