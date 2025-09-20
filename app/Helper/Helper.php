<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\Tenant;

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
