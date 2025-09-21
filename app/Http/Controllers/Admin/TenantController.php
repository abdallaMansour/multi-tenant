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

            $tenant = Tenant::create($data);

            DB::commit();

            // create tenant database credential

            $tenantConfig = config('database.connections.tenant');
            $tenantConfig['database'] = $databaseCredential->db_name;
            $tenantConfig['username'] = $databaseCredential->db_user;
            $tenantConfig['password'] = $databaseCredential->db_password;
            $tenantConfig['log'] = true;
            $tenantConnectionName = 'tenant_' . $databaseCredential->db_name;
            config(["database.connections.$tenantConnectionName" => $tenantConfig]);
            session()->put('tenant_connection_name', $tenantConnectionName);

            $query = DB::connection($tenantConnectionName);

            $sql = 'CREATE DATABASE IF NOT EXISTS ' . $databaseCredential->db_name . ';';
            DB::unprepared($sql);


            $this->refreshTenantDatabase($query, $databaseCredential->db_name);
            $sqlFilePath = storage_path('app/tenant.sql');
            $sqlContent = file_get_contents($sqlFilePath);
            $query->unprepared($sqlContent);

            $databaseCredential->update([
                'tenant_id' => $tenant->id
            ]);

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

    public function refreshTenantDatabase($query, $database)
    {
        // Disable foreign key checks temporarily
        $query->statement('SET FOREIGN_KEY_CHECKS=0');

        // Get the list of tables in the database
        $tables = $query->select("SHOW TABLES FROM {$database}");

        foreach ($tables as $table) {
            $table = reset($table); // Extract the table name from the result

            // Drop each table
            $query->statement("DROP TABLE IF EXISTS `{$table}`");
        }

        // Enable foreign key checks again
        $query->statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
