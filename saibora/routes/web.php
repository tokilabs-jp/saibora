<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    });
});

require __DIR__.'/settings.php';
