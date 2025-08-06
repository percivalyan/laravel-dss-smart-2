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
use App\Http\Controllers\SubCriteriaNonAcademicController;
use App\Http\Controllers\AlternativeValueNonAcademicController;

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
    // Academic
    Route::get('/alternative', [AlternativeController::class, 'index'])->name('alternative.index');
    Route::get('/alternative/create', [AlternativeController::class, 'create'])->name('alternative.create');
    Route::post('/alternative', [AlternativeController::class, 'store'])->name('alternative.store');
    Route::get('/alternative/edit/{id}', [AlternativeController::class, 'edit'])->name('alternative.edit');
    Route::put('/alternative/update/{id}', [AlternativeController::class, 'update'])->name('alternative.update');
    Route::delete('/alternative/delete/{id}', [AlternativeController::class, 'destroy'])->name('alternative.destroy');

    // Non-Academic
    Route::get('/alternative/nonacademic/create', [AlternativeController::class, 'createNonAcademic'])->name('alternative.nonacademic.create');
    Route::post('/alternative/nonacademic', [AlternativeController::class, 'storeNonAcademic'])->name('alternative.nonacademic.store');
    Route::get('/alternative/nonacademic/edit/{id}', [AlternativeController::class, 'editNonAcademic'])->name('alternative.nonacademic.edit');
    Route::put('/alternative/nonacademic/update/{id}', [AlternativeController::class, 'updateNonAcademic'])->name('alternative.nonacademic.update');
    Route::delete('/alternative/nonacademic/delete/{id}', [AlternativeController::class, 'destroyNonAcademic'])->name('alternative.nonacademic.destroy');

    // Route::resource('sub-criteria', SubCriteriaController::class);
    Route::get('sub-criteria', [SubCriteriaController::class, 'index'])->name('sub-criteria.index');
    Route::post('sub-criteria/bulk-update', [SubCriteriaController::class, 'bulkUpdate'])->name('sub-criteria.bulk-update');
    Route::post('sub-criteria/quick-store', [SubCriteriaController::class, 'quickStore'])->name('sub-criteria.quick-store');

    Route::get('sub-criteriana', [SubCriteriaNonAcademicController::class, 'index'])->name('sub-criteriana.index');
    Route::post('sub-criteriana/bulk-update', [SubCriteriaNonAcademicController::class, 'bulkUpdate'])->name('sub-criteriana.bulk-update');
    Route::post('sub-criteriana/quick-store', [SubCriteriaNonAcademicController::class, 'quickStore'])->name('sub-criteriana.quick-store');

    Route::prefix('criteria')->name('criteria.')->group(function () {
        // Index Page
        Route::get('/', [CriteriaController::class, 'index'])->name('index');

        // Academic Criteria
        Route::get('/create', [CriteriaController::class, 'create'])->name('create');
        Route::post('/store', [CriteriaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CriteriaController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CriteriaController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CriteriaController::class, 'destroy'])->name('destroy');

        // Non-Academic Criteria
        Route::get('/non-academic/create', [CriteriaController::class, 'createNonAcademic'])->name('nonacademic.create');
        Route::post('/non-academic/store', [CriteriaController::class, 'storeNonAcademic'])->name('nonacademic.store');
        Route::get('/non-academic/edit/{id}', [CriteriaController::class, 'editNonAcademic'])->name('nonacademic.edit');
        Route::put('/non-academic/update/{id}', [CriteriaController::class, 'updateNonAcademic'])->name('nonacademic.update');
        Route::delete('/non-academic/destroy/{id}', [CriteriaController::class, 'destroyNonAcademic'])->name('nonacademic.destroy');
    });

    // Route::resource('alternative-value', AlternativeValueController::class);
    Route::get('/alternative-value', [AlternativeValueController::class, 'index'])
        ->name('alternative-value.index');

    Route::post('/alternative-value/bulk-update', [AlternativeValueController::class, 'bulkUpdate'])
        ->name('alternative-value.bulk-update');

    Route::get('/alternative-value/smart-calculate', [AlternativeValueController::class, 'smartCalculate'])
        ->name('alternative-value.smart-calculate');

    Route::get('/alternative-valuena', [AlternativeValueNonAcademicController::class, 'index'])
        ->name('alternative-valuena.index');

    Route::post('/alternative-valuena/bulk-update', [AlternativeValueNonAcademicController::class, 'bulkUpdate'])
        ->name('alternative-valuena.bulk-update');

    Route::get('/alternative-valuena/smart-calculate', [AlternativeValueNonAcademicController::class, 'smartCalculate'])
        ->name('alternative-valuena.smart-calculate');
});

Route::fallback([ErrorController::class, 'error404']);
Route::get('/error/403', [ErrorController::class, 'error403']);
Route::get('/error/500', [ErrorController::class, 'error500']);
Route::get('/error/503', [ErrorController::class, 'error503']);
