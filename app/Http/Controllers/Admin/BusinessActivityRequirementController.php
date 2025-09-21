<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BusinessActivity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\BusinessActivityRequirement;

class BusinessActivityRequirementController extends Controller
{
    /**
     * Display a listing of business activity requirements
     */
    public function index(Request $request): View
    {
        $businessActivityRequirements = BusinessActivityRequirement::with('businessActivity')->paginate(10);
        $businessActivities = BusinessActivity::get();

        return view('Dashboard.admin.business-activities.business-activity-requirements', compact('businessActivityRequirements', 'businessActivities'));
    }

    /**
     * Store a newly created business activity requirement
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'business_activity_id' => 'required|exists:business_activities,id',
            'requirements' => 'required|array|min:1',
            'requirements.*.label' => 'required|string|max:255',
            'requirements.*.type' => 'required|string|max:255',
            'requirements.*.is_required' => 'nullable|boolean',
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->requirements as $requirement) {
                BusinessActivityRequirement::create([
                    'business_activity_id' => $request->business_activity_id,
                    'label' => $requirement['label'],
                    'type' => $requirement['type'],
                    'is_required' => isset($requirement['is_required']) ? 1 : 0,
                ]);
            }

            DB::commit();
            return redirect()->route('business-activity-requirements')->with('success', 'Business activity requirements created successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to create business activity requirements!');
        }
    }

    /**
     * Update the specified business activity requirement
     */
    public function update(Request $request, BusinessActivityRequirement $businessActivityRequirement): RedirectResponse
    {
        $request->validate([
            'business_activity_id' => 'required|exists:business_activities,id',
            'label' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'is_required' => 'nullable|boolean',
        ]);

        try {
            DB::beginTransaction();
            $businessActivityRequirement->update([
                'business_activity_id' => $request->business_activity_id,
                'label' => $request->label,
                'type' => $request->type,
                'is_required' => $request->has('is_required') ? 1 : 0,
            ]);

            DB::commit();
            return redirect()->route('business-activity-requirements')->with('success', 'Business activity requirement updated successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to update business activity requirement!');
        }
    }

    /**
     * Remove the specified business activity requirement
     */
    public function destroy(BusinessActivityRequirement $businessActivityRequirement): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $businessActivityRequirement->delete();

            DB::commit();
            return redirect()->route('business-activity-requirements')->with('success', 'Business activity requirement deleted successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to delete business activity requirement!');
        }
    }
}
