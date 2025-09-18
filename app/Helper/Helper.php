<?php

use Illuminate\Support\Facades\Request;
use App\Models\Tenant;

// check if function isTenant
if (!function_exists('isTenant')) {
    function isTenant() {
        $prefix = Request::segment(1);

        if ($prefix !== 'admin') {
            $tenant = Tenant::where('username', $prefix)->first();
            return $tenant?->username ?: false;
        }

        return false;
    }
}
