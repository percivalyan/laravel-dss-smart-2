<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\GuestOnly;
use App\Http\Middleware\AuthOnly;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErrorController;

use App\Http\Controllers\CriteriaCodeController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\AlternativeValueController;
use App\Http\Controllers\SubCriteriaController;

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

    Route::resource('criteria-code', CriteriaCodeController::class);
    Route::resource('alternative', AlternativeController::class);
    // Route::resource('sub-criteria', SubCriteriaController::class);
    Route::get('sub-criteria', [SubCriteriaController::class, 'index'])->name('sub-criteria.index');
    Route::post('sub-criteria/bulk-update', [SubCriteriaController::class, 'bulkUpdate'])->name('sub-criteria.bulk-update');
    Route::post('sub-criteria/quick-store', [SubCriteriaController::class, 'quickStore'])->name('sub-criteria.quick-store');
    Route::resource('criteria', CriteriaController::class);
    // Route::resource('alternative-value', AlternativeValueController::class);
    Route::get('/alternative-value', [AlternativeValueController::class, 'index'])
        ->name('alternative-value.index');

    Route::post('/alternative-value/bulk-update', [AlternativeValueController::class, 'bulkUpdate'])
        ->name('alternative-value.bulk-update');

    Route::get('/alternative-value/smart-calculate', [AlternativeValueController::class, 'smartCalculate'])
        ->name('alternative-value.smart-calculate');
});

Route::fallback([ErrorController::class, 'error404']);
Route::get('/error/403', [ErrorController::class, 'error403']);
Route::get('/error/500', [ErrorController::class, 'error500']);
Route::get('/error/503', [ErrorController::class, 'error503']);
