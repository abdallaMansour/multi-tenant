<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\TenantRegisterController;
use App\Http\Controllers\Admin\BusinessActivityController;
use App\Http\Controllers\Admin\DatabaseCredentialController;
use App\Http\Controllers\Admin\BusinessActivityRequirementController;
use App\Models\BusinessActivity;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/show-mail', function () {
    return view('emails.check-mail', ['email' => 'test@test.com', 'otpCode' => '1234']);
});

Route::view('tenant/register', 'register', ['businessActivities' => BusinessActivity::where('is_active', true)->get()])->name('tenant.register');
Route::post('tenant/register/check-mail', [TenantRegisterController::class, 'checkMail'])->name('tenant.register.check-mail');
Route::post('tenant/register/check-otp', [TenantRegisterController::class, 'checkOtp'])->name('tenant.register.check-otp');
Route::post('tenant/register/get-user-info', [TenantRegisterController::class, 'getUserInfo'])->name('tenant.register.get-user-info');

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
        Route::post('/tenants/{tenant}/toggle', [TenantController::class, 'toggleActive'])->name('tenants.toggle');

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

        // business activity requirements routes
        Route::get('/business-activity-requirements', [BusinessActivityRequirementController::class, 'index'])->name('business-activity-requirements');
        Route::post('/business-activity-requirements', [BusinessActivityRequirementController::class, 'store'])->name('business-activity-requirements.store');
        Route::put('/business-activity-requirements/{businessActivityRequirement}', [BusinessActivityRequirementController::class, 'update'])->name('business-activity-requirements.update');
        Route::delete('/business-activity-requirements/{businessActivityRequirement}', [BusinessActivityRequirementController::class, 'destroy'])->name('business-activity-requirements.destroy');
    });
});

require_once __DIR__ . '/tenant.php';
