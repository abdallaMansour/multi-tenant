<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use App\Models\BusinessActivity;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::with(['businessActivity', 'pages'])->paginate(10);
        $businessActivities = BusinessActivity::where('is_active', true)->get();
        $pages = Page::where('is_active', true)->get();

        return view('Dashboard.admin.themes.themes', compact('themes', 'businessActivities', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method is not needed as we use modals
        return redirect()->route('admin.themes.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'business_activity_id' => 'required|exists:business_activities,id',
            'title' => 'required|string|max:255',
            'features' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'pages' => 'array',
            'pages.*' => 'exists:pages,id',
        ]);

        try {
            DB::beginTransaction();

            $theme = Theme::create([
                'business_activity_id' => $request->business_activity_id,
                'title' => $request->title,
                'features' => $request->features,
                'price' => $request->price,
                'is_active' => $request->boolean('is_active', true),
            ]);

            if ($request->has('pages')) {
                $theme->pages()->sync($request->pages);
            }

            DB::commit();

            return redirect()->route('admin.themes.index')
                ->with('success', __('themes.success_created'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', __('themes.error_created') . ' ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        $theme->load(['businessActivity', 'pages']);
        return response()->json([
            'theme' => $theme,
            'business_activity' => $theme->businessActivity,
            'pages' => $theme->pages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        // This method is not needed as we use modals
        return redirect()->route('admin.themes.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'business_activity_id' => 'required|exists:business_activities,id',
            'title' => 'required|string|max:255',
            'features' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'pages' => 'array',
            'pages.*' => 'exists:pages,id',
        ]);

        try {
            DB::beginTransaction();

            $theme->update([
                'business_activity_id' => $request->business_activity_id,
                'title' => $request->title,
                'features' => $request->features,
                'price' => $request->price,
                'is_active' => $request->boolean('is_active', true),
            ]);

            if ($request->has('pages')) {
                $theme->pages()->sync($request->pages);
            } else {
                $theme->pages()->detach();
            }

            DB::commit();

            return redirect()->route('admin.themes.index')
                ->with('success', __('themes.success_updated'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', __('themes.error_updated') . ' ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        try {
            $theme->delete();

            return redirect()->route('admin.themes.index')
                ->with('success', __('themes.success_deleted'));

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', __('themes.error_deleted') . ' ' . $e->getMessage());
        }
    }

    /**
     * Toggle the active status of a theme.
     */
    public function toggleActive(Request $request, Theme $theme)
    {
        try {
            $isActive = $request->boolean('is_active');
            $theme->update(['is_active' => $isActive]);

            $status = $isActive ? 'activated' : 'deactivated';
            $message = $isActive ? __('themes.success_activated') : __('themes.success_deactivated');

            return response()->json([
                'success' => true,
                'message' => $message,
                'is_active' => $isActive
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('themes.error_toggle') . ' ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get business activities for dropdown.
     */
    public function getBusinessActivities()
    {
        $businessActivities = BusinessActivity::where('is_active', true)->get();
        return response()->json($businessActivities);
    }

    /**
     * Get pages for dropdown.
     */
    public function getPages()
    {
        $pages = Page::where('is_active', true)->get();
        return response()->json($pages);
    }
}
