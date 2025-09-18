<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TenantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

// admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // tenants routes
    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants');
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::put('/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
});


