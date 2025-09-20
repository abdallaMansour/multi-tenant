<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Tenant\AuthController;

$prefix = Request::segment(1);

// admin routes
Route::group(['prefix' => $prefix, 'middleware' => 'is_tenant_path'], function () use ($prefix) {

    // website
    Route::get('/', function () use ($prefix) {
        return view('tenants.' . $prefix . '.index-shop');
    });

    // dashboard
    Route::prefix('dashboard')->as('tenant.')->group(function () use ($prefix) {

        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login');

        Route::middleware(['is_tenant_user'])->group(function () use ($prefix) {

            Route::get('home', [AuthController::class, 'dashboard'])->name('dashboard');
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');

            // settings
            Route::get('settings', [AuthController::class, 'settings'])->name('settings');
            Route::post('settings', [AuthController::class, 'settingsPost'])->name('settings');

        });
    });
});


Route::get('view_tenant', function () {
    return view('Landing.dist.index-shop');
});
