<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('Dashboard.admin.roles.roles', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string|max:255',
            'permissions' => 'array',
        ]);

        try {
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
            ]);

            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            }

            DB::commit();

            return back()->with('success', __('roles.success_created'));
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', __('roles.error_created'));
        }
    }

    public function show(Role $role)
    {
        $role->load('permissions');
        return response()->json($role);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'guard_name' => 'required|string|max:255',
            'permissions' => 'array',
        ]);

        try {
            DB::beginTransaction();

            $role->update([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
            ]);

            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            }

            DB::commit();

            return back()->with('success', __('roles.success_updated'));
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', __('roles.error_updated'));
        }
    }

    public function destroy(Role $role)
    {
        try {
            // Check if role is being used by users
            if ($role->users()->count() > 0) {
                return back()->with('error', __('roles.error_deleted') . ' ' . __('roles.role_in_use'));
            }

            $role->delete();

            return back()->with('success', __('roles.success_deleted'));
        } catch (Exception $e) {
            return back()->with('error', __('roles.error_deleted'));
        }
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'required|array',
        ]);

        try {
            $role->syncPermissions($request->permissions);

            return back()->with('success', __('roles.success_permissions_assigned'));
        } catch (Exception $e) {
            return back()->with('error', __('roles.error_permissions_assigned'));
        }
    }

    public function getPermissions()
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            $parts = explode('-', $permission->name);
            return $parts[1] ?? 'other';
        });

        return response()->json($permissions);
    }
}
