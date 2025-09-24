<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        $roles = Role::all();
        return view('Dashboard.admin.users.users', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('Dashboard.admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($request->has('roles')) {
                $roles = Role::whereIn('id', $request->roles)->get();
                $user->assignRole($roles);
            }

            DB::commit();

            return redirect()->route('admin.users.index')
                ->with('success', __('users.success_created'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', __('users.error_created') . ' ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        $user->load('roles');
        return response()->json([
            'user' => $user,
            'roles' => $user->roles
        ]);
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $user->load('roles');
        return view('Dashboard.admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ]);

        try {
            DB::beginTransaction();

            $userData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);

            // Sync roles
            if ($request->has('roles')) {
                $roles = Role::whereIn('id', $request->roles)->get();
                $user->syncRoles($roles);
            } else {
                $user->syncRoles([]);
            }

            DB::commit();

            return redirect()->route('admin.users.index')
                ->with('success', __('users.success_updated'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', __('users.error_updated') . ' ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            // Check if user is trying to delete themselves
            if ($user->id === auth()->id()) {
                return redirect()->back()
                    ->with('error', __('users.error_cannot_delete_self'));
            }

            // Check if user has any important roles
            if ($user->hasRole('Super Admin') && User::role('Super Admin')->count() <= 1) {
                return redirect()->back()
                    ->with('error', __('users.error_cannot_delete_last_super_admin'));
            }

            $user->delete();

            return redirect()->route('admin.users.index')
                ->with('success', __('users.success_deleted'));

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', __('users.error_deleted') . ' ' . $e->getMessage());
        }
    }

    public function getRoles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }
}
