<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant_Setting;

// check if function isTenantPath
if (!function_exists('isTenantPath')) {
    function isTenantPath() {
        $prefix = Request::segment(1);

        if ($prefix !== 'admin') {
            $tenant = Tenant::where('username', $prefix)->first();
            return $tenant?->username ?: false;
        }

        return false;
    }
}

// check if function isTenantUser
if (!function_exists('isTenantUser')) {
    function isTenantUser() {
        $tenant = Auth::guard('tenant')->user();
        return $tenant ?: false;
    }
}

// check if function tenantConnectionDatabase
if (!function_exists('tenantConnectionDatabase')) {
    function tenantConnectionDatabase() {

        $prefix = Request::segment(1);
        $tenant = Tenant::where('username', $prefix)->first();
        if (!$tenant) {
            return false;
        }

        $databaseCredential = $tenant->databaseCredential;
        if (!$databaseCredential) {
            throw new \Exception('Database credential not found');
        }

        $tenantConfig = config('database.connections.tenant');
        $tenantConfig['database'] = $databaseCredential->db_name;
        $tenantConfig['username'] = $databaseCredential->db_user;
        $tenantConfig['password'] = $databaseCredential->db_password;
        $tenantConfig['log'] = true;
        $tenantConnectionName = 'tenant_' . $databaseCredential->db_name;
        config(["database.connections.$tenantConnectionName" => $tenantConfig]);
        session()->put('tenant_connection_name', $tenantConnectionName);

        DB::connection($tenantConnectionName);

        return $tenantConnectionName;
    }
}

// getSettingProperty
if (!function_exists('getSettingProperty')) {
    function getSettingProperty($label) {
        $query = tenantConnectionDatabase();

        $setting = Tenant_Setting::on($query)->where('label', $label)->first();
        return $setting?->value ?? null;
    }
}