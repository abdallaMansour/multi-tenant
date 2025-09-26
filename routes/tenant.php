<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Tenant\AuthController;
use App\Http\Controllers\Tenant\SettingsController;
use App\Http\Controllers\Tenant\Theme\ECommerce\Landrick\WebsiteController;

$prefix = getTenantPrefix();;

// admin routes
if ($prefix) {
    Route::group(['prefix' => $prefix, 'middleware' => 'is_tenant_path'], function () use ($prefix) {

        // website
        Route::get('/', [WebsiteController::class, 'home'])->name('home');

        // dashboard
        Route::prefix('dashboard')->as('tenant.')->group(function () use ($prefix) {

            Route::middleware(['guest'])->group(function () use ($prefix) {
                Route::get('login', [AuthController::class, 'login'])->name('login');
                Route::post('send-otp', [AuthController::class, 'sendOtp'])->name('send-otp');
                Route::post('login-otp', [AuthController::class, 'loginOtp'])->name('login-otp');
            });

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
}


// Route::get('view_tenant', function () {
//     return view('Themes.eCommerce.landrick.index-shop');
// });
