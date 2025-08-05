<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\GuestOnly;
use App\Http\Middleware\AuthOnly;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErrorController;

Route::get('/', fn() => redirect('/login'));

Route::middleware([GuestOnly::class])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware([AuthOnly::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Tambahkan dalam middleware AuthOnly
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.update');
    Route::resource('users', UserController::class);
    Route::get('/users/{id}/profile', [UserController::class, 'show'])->name('users.profile');
});

Route::fallback([ErrorController::class, 'error404']);
Route::get('/error/403', [ErrorController::class, 'error403']);
Route::get('/error/500', [ErrorController::class, 'error500']);
Route::get('/error/503', [ErrorController::class, 'error503']);
