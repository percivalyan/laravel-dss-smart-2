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
    // Index
    Route::get('/data-kode-kriteria', [CriteriaCodeController::class, 'index'])->name('criteria_code.index');

    // Create Form
    Route::get('/data-kode-kriteria/input-data-kode-kriteria', [CriteriaCodeController::class, 'create'])->name('criteria_code.create');

    // Store Data
    Route::post('/data-kode-kriteria', [CriteriaCodeController::class, 'store'])->name('criteria_code.store');

    // Edit Form
    Route::get('/data-kode-kriteria/{id}/edit-data-kode-kriteria', [CriteriaCodeController::class, 'edit'])->name('criteria_code.edit');

    // Update Data
    Route::put('/data-kode-kriteria/{id}', [CriteriaCodeController::class, 'update'])->name('criteria_code.update');

    // Delete Data
    Route::delete('/data-kode-kriteria/{id}', [CriteriaCodeController::class, 'destroy'])->name('criteria_code.destroy');

    // Academic
    Route::get('/data-alternatif-akademik-dan-non-akademik', [AlternativeController::class, 'index'])->name('alternative.index');
    Route::get('/data-alternatif-akademik/input-data-alternatif-akademik', [AlternativeController::class, 'create'])->name('alternative.create');
    Route::post('/data-alternatif-akademik', [AlternativeController::class, 'store'])->name('alternative.store');
    Route::get('/data-alternatif-akademik/edit-data-alternatif-akademik/{id}', [AlternativeController::class, 'edit'])->name('alternative.edit');
    Route::put('/data-alternatif-akademik/update/{id}', [AlternativeController::class, 'update'])->name('alternative.update');
    Route::delete('/data-alternatif-akademik/delete/{id}', [AlternativeController::class, 'destroy'])->name('alternative.destroy');

    // Non-Academic
    Route::get('/data-alternatif-akademik/input-data-non-alternatif-akademik', [AlternativeController::class, 'createNonAcademic'])->name('alternative.nonacademic.create');
    Route::post('/data-alternatif-non-akademik', [AlternativeController::class, 'storeNonAcademic'])->name('alternative.nonacademic.store');
    Route::get('/data-alternatif-non-akademik/edit-data-non-alternatif-akademik/{id}', [AlternativeController::class, 'editNonAcademic'])->name('alternative.nonacademic.edit');
    Route::put('/data-alternatif-non-akademik/update/{id}', [AlternativeController::class, 'updateNonAcademic'])->name('alternative.nonacademic.update');
    Route::delete('/data-alternatif-non-akademik/delete/{id}', [AlternativeController::class, 'destroyNonAcademic'])->name('alternative.nonacademic.destroy');

    // Route::resource('sub-criteria', SubCriteriaController::class);
    Route::get('data-sub-kriteria-akademik', [SubCriteriaController::class, 'index'])->name('sub-criteria.index');
    Route::post('data-sub-kriteria-akademik/bulk-update', [SubCriteriaController::class, 'bulkUpdate'])->name('sub-criteria.bulk-update');
    Route::post('data-sub-kriteria-akademik/quick-store', [SubCriteriaController::class, 'quickStore'])->name('sub-criteria.quick-store');

    Route::get('data-sub-kriteria-non-akademik', [SubCriteriaNonAcademicController::class, 'index'])->name('sub-criteriana.index');
    Route::post('data-sub-kriteria-non-akademik/bulk-update', [SubCriteriaNonAcademicController::class, 'bulkUpdate'])->name('sub-criteriana.bulk-update');
    Route::post('data-sub-kriteria-non-akademik/quick-store', [SubCriteriaNonAcademicController::class, 'quickStore'])->name('sub-criteriana.quick-store');

    // Academic Criteria
    Route::get('/data-kriteria-akademik-dan-non-akademik', [CriteriaController::class, 'index'])->name('criteria.index');
    Route::get('/data-kriteria-akademik/input-data-kriteria-akademik', [CriteriaController::class, 'create'])->name('criteria.create');
    Route::post('/data-kriteria-akademik/store', [CriteriaController::class, 'store'])->name('criteria.store');
    Route::get('/data-kriteria-akademik/edit-data-kriteria-akademik/{id}', [CriteriaController::class, 'edit'])->name('criteria.edit');
    Route::put('/data-kriteria-akademik/update/{id}', [CriteriaController::class, 'update'])->name('criteria.update');
    Route::delete('/data-kriteria-akademik/destroy/{id}', [CriteriaController::class, 'destroy'])->name('criteria.destroy');

    // Non-Academic Criteria
    Route::get('/data-kriteria-non-akademik/input-data-kriteria-non-akademik', [CriteriaController::class, 'createNonAcademic'])->name('criteria.nonacademic.create');
    Route::post('/data-kriteria-non-akademik/store', [CriteriaController::class, 'storeNonAcademic'])->name('criteria.nonacademic.store');
    Route::get('/data-kriteria-non-akademik/edit-data-kriteria-non-akademik/{id}', [CriteriaController::class, 'editNonAcademic'])->name('criteria.nonacademic.edit');
    Route::put('/data-kriteria-non-akademik/update/{id}', [CriteriaController::class, 'updateNonAcademic'])->name('criteria.nonacademic.update');
    Route::delete('/data-kriteria-non-akademik/destroy/{id}', [CriteriaController::class, 'destroyNonAcademic'])->name('criteria.nonacademic.destroy');

    // Route::resource('alternative-value', AlternativeValueController::class);
    Route::get('/data-nilai-alternatif-akademik', [AlternativeValueController::class, 'index'])
        ->name('alternative-value.index');

    Route::post('/data-nilai-alternatif-akademik/edit-semua-nilai-akademik', [AlternativeValueController::class, 'bulkUpdate'])
        ->name('alternative-value.bulk-update');

    Route::get('/data-nilai-alternatif-akademik/perhitungan-spk-smart-nilai-akademik', [AlternativeValueController::class, 'smartCalculate'])
        ->name('alternative-value.smart-calculate');

    Route::get('/data-nilai-alternatif-non-akademik', [AlternativeValueNonAcademicController::class, 'index'])
        ->name('alternative-valuena.index');

    Route::post('/data-nilai-alternatif-non-akademik/edit-semua-nilai-non-akademik', [AlternativeValueNonAcademicController::class, 'bulkUpdate'])
        ->name('alternative-valuena.bulk-update');

    Route::get('/data-nilai-alternatif-non-akademik/sperhitungan-spk-smart-nilai-non-akademik', [AlternativeValueNonAcademicController::class, 'smartCalculate'])
        ->name('alternative-valuena.smart-calculate');
});

Route::fallback([ErrorController::class, 'error404']);
Route::get('/error/403', [ErrorController::class, 'error403']);
Route::get('/error/500', [ErrorController::class, 'error500']);
Route::get('/error/503', [ErrorController::class, 'error503']);
