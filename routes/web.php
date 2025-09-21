<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\DatabaseCredentialController;
use App\Http\Controllers\Admin\BusinessActivityController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

    // admin routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', [AuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // tenants routes
        Route::get('/tenants', [TenantController::class, 'index'])->name('tenants');
        Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
        Route::put('/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
        Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');

        // database routes
        Route::get('/database-credentials', [DatabaseCredentialController::class, 'index'])->name('database-credentials');
        Route::post('/database-credentials', [DatabaseCredentialController::class, 'store'])->name('database-credentials.store');
        Route::put('/database-credentials/{databaseCredential}', [DatabaseCredentialController::class, 'update'])->name('database-credentials.update');
        Route::delete('/database-credentials/{databaseCredential}', [DatabaseCredentialController::class, 'destroy'])->name('database-credentials.destroy');

        // business activities routes
        Route::get('/business-activities', [BusinessActivityController::class, 'index'])->name('business-activities');
        Route::post('/business-activities', [BusinessActivityController::class, 'store'])->name('business-activities.store');
        Route::put('/business-activities/{businessActivity}', [BusinessActivityController::class, 'update'])->name('business-activities.update');
        Route::delete('/business-activities/{businessActivity}', [BusinessActivityController::class, 'destroy'])->name('business-activities.destroy');
    });
});

require_once __DIR__ . '/tenant.php';
