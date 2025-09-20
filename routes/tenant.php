<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Tenant\AuthController;
use App\Http\Controllers\Tenant\SettingsController;
use App\Http\Controllers\Tenant\ShopController;

$prefix = Request::segment(1);

// admin routes
Route::group(['prefix' => $prefix, 'middleware' => 'is_tenant_path'], function () use ($prefix) {

    // website
    Route::get('/', [ShopController::class, 'home'])->name('home');

    // dashboard
    Route::prefix('dashboard')->as('tenant.')->group(function () use ($prefix) {

        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login');

        Route::middleware(['is_tenant_user'])->group(function () use ($prefix) {

            Route::get('home', [AuthController::class, 'dashboard'])->name('dashboard');
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');

            // settings
            Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
            Route::post('settings', [SettingsController::class, 'settingsPost'])->name('settings.post');
            Route::post('settings/add', [SettingsController::class, 'addSetting'])->name('settings.add');

        });
    });
});


Route::get('view_tenant', function () {
    return view('Landing.dist.index-shop');
});
