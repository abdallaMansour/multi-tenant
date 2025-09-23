<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        // Get all permissions grouped by category
        $permissions = Permission::all()->groupBy(function ($permission) {
            $parts = explode('-', $permission->name);
            return $parts[1] ?? 'other';
        });

        // Sort permissions within each category
        foreach ($permissions as $category => $categoryPermissions) {
            $permissions[$category] = $categoryPermissions->sortBy('name');
        }

        return view('Dashboard.admin.permissions.permissions', compact('permissions'));
    }

    public function show(Permission $permission)
    {
        // Get roles that have this permission
        $roles = $permission->roles;
        
        return response()->json([
            'permission' => $permission,
            'roles' => $roles
        ]);
    }
}
