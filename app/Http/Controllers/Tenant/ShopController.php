<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant_Setting;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ShopController extends Controller
{
    public function home()
    {
        $query = tenantConnectionDatabase();

        $prefix = FacadesRequest::segment(1);

        $settings = Tenant_Setting::on($query)->get();

        return view('tenants.' . $prefix . '.index-shop', compact('settings'));
    }
}
