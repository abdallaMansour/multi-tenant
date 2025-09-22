<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BusinessActivity;
use App\Models\DatabaseCredential;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class BusinessActivityController extends Controller
{
    /**
     * Display a listing of database credentials
     */
    public function index(Request $request)
    {
        $businessActivities = BusinessActivity::where('is_active', 1)->get();

        // If it's an API request, return JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($businessActivities);
        }

        // Otherwise return view for admin panel
        $businessActivities = BusinessActivity::paginate(10);
        return view('Dashboard.admin.business-activities.business-activities', compact('businessActivities'));
    }

    /**
     * Store a newly created database credential
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            DB::beginTransaction();

            $businessActivity = BusinessActivity::create([
                'name' => $request->name,
                'is_active' => $request->input('is_active', 0),
            ]);

            $businessActivity->addMediaFromRequest('icon')->toMediaCollection();

            DB::commit();
            return redirect()->route('business-activities')->with('success', 'Business activity created successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to create business activity!');
        }
    }

    /**
     * Update the specified database credential
     */
    public function update(Request $request, BusinessActivity $businessActivity): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            DB::beginTransaction();
            $businessActivity->update([
                'name' => $request->name,
                'is_active' => $request->input('is_active', 0),
            ]);

            if ($request->hasFile('icon')) {
                $businessActivity->clearMediaCollection();
                $businessActivity->addMediaFromRequest('icon')->toMediaCollection();
            }

            DB::commit();
            return redirect()->route('business-activities')->with('success', 'Business activity updated successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to update business activity!');
        }
    }

    /**
     * Remove the specified database credential
     */
    public function destroy(BusinessActivity $businessActivity): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $businessActivity->clearMediaCollection();
            $businessActivity->delete();

            DB::commit();
            return redirect()->route('business-activities')->with('success', 'Business activity deleted successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to delete business activity!');
        }
    }
}
