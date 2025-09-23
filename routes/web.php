<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\TenantRegisterController;
use App\Http\Controllers\Admin\BusinessActivityController;
use App\Http\Controllers\Admin\DatabaseCredentialController;
use App\Http\Controllers\Admin\BusinessActivityRequirementController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Models\BusinessActivity;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('admin/show-mail', function () {
        return view('emails.check-mail', ['email' => 'test@test.com', 'otpCode' => '1234']);
    });

    Route::group(['middleware' => 'guest'], function () {
        Route::view('tenant/register', 'register', ['businessActivities' => BusinessActivity::where('is_active', true)->get()])->name('tenant.register');
        Route::post('tenant/register/check-mail', [TenantRegisterController::class, 'checkMail'])->name('tenant.register.check-mail');
        Route::post('tenant/register/check-otp', [TenantRegisterController::class, 'checkOtp'])->name('tenant.register.check-otp');
        Route::post('tenant/register/get-user-info', [TenantRegisterController::class, 'getUserInfo'])->name('tenant.register.get-user-info');
    });

    Route::group(['prefix' => 'admin'], function () {

        Route::group(['middleware' => 'guest'], function () {
            Route::get('/login', [AuthController::class, 'login'])->name('login');
            Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
        });

        // admin routes
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/home', [AuthController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

            // tenants routes
            Route::get('/tenants', [TenantController::class, 'index'])->name('tenants')->middleware('can:read-tenant');
            Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store')->middleware('can:create-tenant');
            Route::put('/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update')->middleware('can:update-tenant');
            Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy')->middleware('can:delete-tenant');
            Route::post('/tenants/{tenant}/toggle', [TenantController::class, 'toggleActive'])->name('tenants.toggle')->middleware('can:update-tenant');

            // database routes
            Route::get('/database-credentials', [DatabaseCredentialController::class, 'index'])->name('database-credentials')->middleware('can:read-database_credential');
            Route::post('/database-credentials', [DatabaseCredentialController::class, 'store'])->name('database-credentials.store')->middleware('can:create-database_credential');
            Route::put('/database-credentials/{databaseCredential}', [DatabaseCredentialController::class, 'update'])->name('database-credentials.update')->middleware('can:update-database_credential');
            Route::delete('/database-credentials/{databaseCredential}', [DatabaseCredentialController::class, 'destroy'])->name('database-credentials.destroy')->middleware('can:delete-database_credential');

            // business activities routes
            Route::get('/business-activities', [BusinessActivityController::class, 'index'])->name('business-activities')->middleware('can:read-business_activity');
            Route::post('/business-activities', [BusinessActivityController::class, 'store'])->name('business-activities.store')->middleware('can:create-business_activity');
            Route::put('/business-activities/{businessActivity}', [BusinessActivityController::class, 'update'])->name('business-activities.update')->middleware('can:update-business_activity');
            Route::delete('/business-activities/{businessActivity}', [BusinessActivityController::class, 'destroy'])->name('business-activities.destroy')->middleware('can:delete-business_activity');

            // business activity requirements routes
            Route::get('/business-activity-requirements', [BusinessActivityRequirementController::class, 'index'])->name('business-activity-requirements')->middleware('can:read-business_activity_requirement');
            Route::post('/business-activity-requirements', [BusinessActivityRequirementController::class, 'store'])->name('business-activity-requirements.store')->middleware('can:create-business_activity_requirement');
            Route::put('/business-activity-requirements/{businessActivityRequirement}', [BusinessActivityRequirementController::class, 'update'])->name('business-activity-requirements.update')->middleware('can:update-business_activity_requirement');
            Route::delete('/business-activity-requirements/{businessActivityRequirement}', [BusinessActivityRequirementController::class, 'destroy'])->name('business-activity-requirements.destroy')->middleware('can:delete-business_activity_requirement');

            // roles & permissions routes
            Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('can:read-role');
            Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store')->middleware('can:create-role');
            Route::get('/roles/permissions', [RoleController::class, 'getPermissions'])->name('admin.roles.permissions.get')->middleware('can:read-role');
            Route::get('/roles/{role}', [RoleController::class, 'show'])->name('admin.roles.show')->middleware('can:read-role');
            Route::put('/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update')->middleware('can:update-role');
            Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('can:delete-role');
            Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->name('admin.roles.permissions')->middleware('can:update-role');

            // permissions routes
            Route::get('/permissions', [PermissionController::class, 'index'])->name('admin.permissions.index')->middleware('can:read-permission');
            Route::get('/permissions/{permission}', [PermissionController::class, 'show'])->name('admin.permissions.show')->middleware('can:read-permission');
        });
    });

    require_once __DIR__ . '/tenant.php';
});
