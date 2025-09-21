<?php

namespace App\Http\Controllers\Tenant\Theme\ECommerce\Landrick;

use App\Http\Controllers\Controller;
use App\Models\Tenant_Setting;

class WebsiteController extends Controller
{
    public function home()
    {
        $query = tenantConnectionDatabase();

        $settings = Tenant_Setting::on($query)->get();

        return view('Themes.eCommerce.landrick.index-shop', compact('settings'));
    }
}
