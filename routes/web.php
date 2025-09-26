<?php

use App\Models\BusinessActivity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\TenantRegisterController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\BusinessActivityController;
use App\Http\Controllers\Admin\DatabaseCredentialController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\BusinessActivityRequirementController;

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

            // users routes
            Route::get('/users', [UserController::class, 'index'])->name('admin.users.index')->middleware('can:read-admin');
            Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create')->middleware('can:create-admin');
            Route::post('/users', [UserController::class, 'store'])->name('admin.users.store')->middleware('can:create-admin');
            Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show')->middleware('can:read-admin');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit')->middleware('can:update-admin');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update')->middleware('can:update-admin');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy')->middleware('can:delete-admin');
            Route::get('/users/roles', [UserController::class, 'getRoles'])->name('admin.users.roles')->middleware('can:read-admin');

            // pages routes
            Route::get('/pages', [PageController::class, 'index'])->name('admin.pages.index')->middleware('can:read-page');
            Route::get('/pages/create', [PageController::class, 'create'])->name('admin.pages.create')->middleware('can:create-page');
            Route::post('/pages', [PageController::class, 'store'])->name('admin.pages.store')->middleware('can:create-page');
            Route::get('/pages/{page}', [PageController::class, 'show'])->name('admin.pages.show')->middleware('can:read-page');
            Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('admin.pages.edit')->middleware('can:update-page');
            Route::put('/pages/{page}', [PageController::class, 'update'])->name('admin.pages.update')->middleware('can:update-page');
            Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('admin.pages.destroy')->middleware('can:delete-page');
            Route::post('/pages/{page}/toggle', [PageController::class, 'toggleActive'])->name('admin.pages.toggle')->middleware('can:update-page');

            // themes routes
            Route::get('/themes', [ThemeController::class, 'index'])->name('admin.themes.index')->middleware('can:read-theme');
            Route::get('/themes/create', [ThemeController::class, 'create'])->name('admin.themes.create')->middleware('can:create-theme');
            Route::post('/themes', [ThemeController::class, 'store'])->name('admin.themes.store')->middleware('can:create-theme');
            Route::get('/themes/{theme}', [ThemeController::class, 'show'])->name('admin.themes.show')->middleware('can:read-theme');
            Route::get('/themes/{theme}/edit', [ThemeController::class, 'edit'])->name('admin.themes.edit')->middleware('can:update-theme');
            Route::put('/themes/{theme}', [ThemeController::class, 'update'])->name('admin.themes.update')->middleware('can:update-theme');
            Route::delete('/themes/{theme}', [ThemeController::class, 'destroy'])->name('admin.themes.destroy')->middleware('can:delete-theme');
            Route::post('/themes/{theme}/toggle', [ThemeController::class, 'toggleActive'])->name('admin.themes.toggle')->middleware('can:update-theme');
            Route::get('/themes/business-activities', [ThemeController::class, 'getBusinessActivities'])->name('admin.themes.business-activities')->middleware('can:read-theme');
            Route::get('/themes/pages', [ThemeController::class, 'getPages'])->name('admin.themes.pages')->middleware('can:read-theme');

            // packages routes
            Route::get('/packages', [PackageController::class, 'index'])->name('admin.packages.index')->middleware('can:read-package');
            Route::get('/packages/create', [PackageController::class, 'create'])->name('admin.packages.create')->middleware('can:create-package');
            Route::post('/packages', [PackageController::class, 'store'])->name('admin.packages.store')->middleware('can:create-package');
            Route::get('/packages/{package}', [PackageController::class, 'show'])->name('admin.packages.show')->middleware('can:read-package');
            Route::get('/packages/{package}/edit', [PackageController::class, 'edit'])->name('admin.packages.edit')->middleware('can:update-package');
            Route::put('/packages/{package}', [PackageController::class, 'update'])->name('admin.packages.update')->middleware('can:update-package');
            Route::delete('/packages/{package}', [PackageController::class, 'destroy'])->name('admin.packages.destroy')->middleware('can:delete-package');
            Route::post('/packages/{package}/toggle', [PackageController::class, 'toggleActive'])->name('admin.packages.toggle')->middleware('can:update-package');
        });
    });

    Route::get('change-lang/{lang}', function ($lang) {
        if (auth()->check()) {
            auth()->user()->update(['default_lang' => $lang]);
            return response()->json(['success' => true, 'message' => 'Language updated successfully']);
        }
        return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
    })->name('change-lang')->middleware('auth');

    Route::get('change-color-mode/{color_mode}', function ($color_mode) {
        if (auth()->check()) {
            auth()->user()->update(['color_mode' => $color_mode]);
            return response()->json(['success' => true, 'message' => 'Color mode updated successfully']);
        }
        return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
    })->name('change-color-mode')->middleware('auth');

    require_once __DIR__ . '/tenant.php';
});
