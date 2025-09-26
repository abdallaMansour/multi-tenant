<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::paginate(10);
        return view('Dashboard.admin.packages.packages', compact('packages'));
    }

    public function create()
    {
        return view('Dashboard.admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|in:on,off',
            'trial_days' => 'required|integer|min:0',
            'plan' => 'required|in:monthly,yearly',
            'price' => 'required|numeric|min:0',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $package = Package::create([
                'name' => $request->name,
                'is_active' => $request->has('is_active'),
                'trial_days' => $request->trial_days,
                'plan' => $request->plan,
                'price' => $request->price,
                'features' => $request->features,
            ]);

            DB::commit();

            return redirect()->route('admin.packages.index')
                ->with('success', __('packages.success_created'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', __('packages.error_created') . ' ' . $e->getMessage());
        }
    }

    public function show(Package $package)
    {
        return response()->json([
            'package' => $package
        ]);
    }

    public function edit(Package $package)
    {
        return view('Dashboard.admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|in:on,off',
            'trial_days' => 'required|integer|min:0',
            'plan' => 'required|in:monthly,yearly',
            'price' => 'required|numeric|min:0',
            'features' => 'required|array|min:1',
            'features.*' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $package->update([
                'name' => $request->name,
                'is_active' => $request->has('is_active'),
                'trial_days' => $request->trial_days,
                'plan' => $request->plan,
                'price' => $request->price,
                'features' => $request->features,
            ]);

            DB::commit();

            return redirect()->route('admin.packages.index')
                ->with('success', __('packages.success_updated'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', __('packages.error_updated') . ' ' . $e->getMessage());
        }
    }

    public function destroy(Package $package)
    {
        try {
            $package->delete();

            return redirect()->route('admin.packages.index')
                ->with('success', __('packages.success_deleted'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', __('packages.error_deleted') . ' ' . $e->getMessage());
        }
    }

    public function toggleActive(Package $package)
    {
        try {
            $package->update(['is_active' => !$package->is_active]);

            return response()->json([
                'success' => true,
                'message' => __('packages.success_toggled'),
                'is_active' => $package->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('packages.error_toggled') . ' ' . $e->getMessage()
            ], 500);
        }
    }
}
