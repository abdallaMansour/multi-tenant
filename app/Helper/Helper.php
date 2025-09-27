<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant_Setting;

if (!function_exists('getAllKeyLangs')) {
    function getAllKeyLangs()
    {
        return array_keys(config('laravellocalization.supportedLocales'));
    }
}

// check if function getPathLang
if (!function_exists('getPathLang')) {
    function getPathLang()
    {
        $prefix = Request::segment(1);
        $allKeyLangs = getAllKeyLangs();

        if (in_array($prefix, $allKeyLangs))
            return $prefix;

        return null;
    }
}

// check if function getTenantPrefix
if (!function_exists('getTenantPrefix')) {
    function getTenantPrefix()
    {
        $prefix = Request::segment(1);
        $allKeyLangs = getAllKeyLangs();
        // some times path starting with ar/ or en/ or etc.
        // so we need to skip first prefix if it is in $allKeyLangs
        if (in_array($prefix, $allKeyLangs)) {
            $prefix = Request::segment(2);
        }
        return $prefix;
    }
}

// check if function isTenantPath
if (!function_exists('isTenantPath')) {
    function isTenantPath()
    {
        $prefix = getTenantPrefix();

        if ($prefix !== 'admin') {
            $tenant = Tenant::where('username', $prefix)->first();
            return $tenant?->username ?: false;
        }

        return false;
    }
}

// check if function isTenantUser
if (!function_exists('isTenantUser')) {
    function isTenantUser()
    {
        $tenant = Auth::guard('tenant')->user();
        return $tenant ?: false;
    }
}

// check if function tenantConnectionDatabase
if (!function_exists('tenantConnectionDatabase')) {
    function tenantConnectionDatabase()
    {

        $prefix = getTenantPrefix();
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
    function getSettingProperty($label)
    {
        $query = tenantConnectionDatabase();

        $setting = Tenant_Setting::on($query)->where('label', $label)->first();
        return $setting?->value ?? null;
    }
}

// check if function authUser
if (!function_exists('authUser')) {
    /**
     * Get the authenticated user.
     *
     * @return \App\Models\User|\App\Models\Tenant|null
     */
    function authUser()
    {
        return Auth::user() ?? Auth::guard('tenant')->user();
    }
}
