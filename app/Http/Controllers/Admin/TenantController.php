<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Support\Str;
use App\Models\DatabaseCredential;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Tenant\StoreTenantRequest;
use App\Http\Requests\Admin\Tenant\UpdateTenantRequest;
use App\Service\DatabaseService;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();

        return view('Dashboard.admin.tenants.tenants', compact('tenants'));
    }

    public function store(StoreTenantRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();

            $databaseCredential = DatabaseCredential::where('tenant_id', null)->first();
            if (!$databaseCredential) {
                throw new \Exception('There is no active database credential found');
            }

            $data['username'] = Str::slug($data['username']);

            if ($data['username'] == 'admin' || Tenant::where('username', $data['username'])->exists()) {
                DB::rollBack();
                throw new \Exception('Username already exists');
            }

            $tenant = Tenant::create($data);

            DB::commit();

            DatabaseService::createTenantDatabase($tenant, $databaseCredential);

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

            if ($data['username'] == 'admin' || Tenant::where('username', $data['username'])->exists()) {
                DB::rollBack();
                throw new \Exception('Username already exists');
            }

            $tenant->update($data);

            DB::commit();
            return redirect()->route('tenants')->with('success', 'Tenant updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('tenants')->with('error', $th->getMessage());
        }
    }

    // public function destroy(Tenant $tenant)
    // {
    //     try {
    //         DB::beginTransaction();

    //         // // delete tenant directory
    //         // $tenantDirectory = resource_path('views/tenants/' . $tenant->username);
    //         // if (file_exists($tenantDirectory)) {
    //         //     File::deleteDirectory($tenantDirectory);
    //         // }

    //         $tenant->databaseCredential()->update([
    //             'tenant_id' => null
    //         ]);

    //         $tenant->delete();

    //         DB::commit();
    //         return redirect()->route('tenants')->with('success', 'Tenant deleted successfully');
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         return redirect()->route('tenants')->with('error', $th->getMessage());
    //     }
    // }

    /**
     * Drop table if exists
     */

    public function toggleActive(Tenant $tenant)
    {
        try {
            DB::beginTransaction();
            $tenant->update([
                'is_active' => !$tenant->is_active
            ]);
            DB::commit();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tenant status updated successfully',
                    'is_active' => $tenant->is_active
                ]);
            }

            return redirect()->route('tenants')->with('success', 'Tenant activated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $th->getMessage()
                ], 500);
            }

            return redirect()->route('tenants')->with('error', $th->getMessage());
        }
    }
}
