<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'today'])->name('home');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::resource('tasks', TaskController::class)->except(['index', 'show']);
});

Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
