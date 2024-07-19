<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::view('/', 'welcome');

Route::get('todos', [TodoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('todos');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
