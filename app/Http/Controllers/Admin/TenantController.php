<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Tenant\StoreTenantRequest;
use App\Http\Requests\Admin\Tenant\UpdateTenantRequest;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();

        return view('Dashboard.dist.tenants.tenants', compact('tenants'));
    }

    public function store(StoreTenantRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();

            $data['username'] = Str::slug($data['username']);

            $tenant = Tenant::create($data);

            // create tenant directory
            $tenantDirectory = resource_path('views/tenants/' . $tenant->username);
            if (!file_exists($tenantDirectory)) {
                mkdir($tenantDirectory, 0777, true);
            }

            // create tenant index-shop.blade.php
            $tenantIndexShop = resource_path('views/tenants/' . $tenant->username . '/index-shop.blade.php');
            if (!file_exists($tenantIndexShop)) {
                file_put_contents($tenantIndexShop, file_get_contents(base_path('resources/views/Landing/dist/index-shop.blade.php')));
            }

            $source = resource_path('views/Landing/dist/layouts');
            $destination = resource_path('views/tenants/' . $tenant->username . '/layouts');
            
            File::copyDirectory($source, $destination);


            DB::commit();
            return redirect()->route('tenants')->with('success', 'Tenant created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('tenants')->with('error', $th->getMessage());
        }
    }

    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();

            $data['username'] = Str::slug($data['username']);

            $tenant->update($data);

            DB::commit();
            return redirect()->route('tenants')->with('success', 'Tenant updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('tenants')->with('error', $th->getMessage());
        }
    }

    public function destroy(Tenant $tenant)
    {
        try {
            DB::beginTransaction();
            $tenant->delete();

            // delete tenant directory
            $tenantDirectory = resource_path('views/tenants/' . $tenant->username);
            if (file_exists($tenantDirectory)) {
                File::deleteDirectory($tenantDirectory);
            }

            DB::commit();
            return redirect()->route('tenants')->with('success', 'Tenant deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('tenants')->with('error', $th->getMessage());
        }
    }
}
