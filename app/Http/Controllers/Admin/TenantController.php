<?php
namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
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
        $data = $request->validated();

        $data['username'] = Str::slug($data['username']);

        Tenant::create($data);

        return redirect()->route('tenants')->with('success', 'Tenant created successfully');
    }

    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        $data = $request->validated();

        $data['username'] = Str::slug($data['username']);

        $tenant->update($data);

        return redirect()->route('tenants')->with('success', 'Tenant updated successfully');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants')->with('success', 'Tenant deleted successfully');
    }

}
