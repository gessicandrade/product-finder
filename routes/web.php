<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('admin/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
