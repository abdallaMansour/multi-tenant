<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::paginate(10);
        return view('Dashboard.admin.pages.pages', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'is_active' => 'boolean',
        ]);

        try {
            DB::beginTransaction();

            Page::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'is_active' => $request->boolean('is_active', true),
            ]);

            DB::commit();

            return back()->with('success', __('pages.success_created'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', __('pages.error_created') . ' ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('pages', 'slug')->ignore($page->id)
            ],
            'is_active' => 'boolean',
        ]);

        try {
            DB::beginTransaction();

            $page->update([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'is_active' => $request->boolean('is_active', true),
            ]);

            DB::commit();

            return back()->with('success', __('pages.success_updated'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', __('pages.error_updated') . ' ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        try {
            $page->delete();

            return back()->with('success', __('pages.success_deleted'));
        } catch (\Exception $e) {
            return back()->with('error', __('pages.error_deleted') . ' ' . $e->getMessage());
        }
    }

    /**
     * Toggle the active status of a page.
     */
    public function toggleActive(Request $request, Page $page)
    {
        try {
            $isActive = $request->boolean('is_active');
            $page->update(['is_active' => $isActive]);

            $status = $isActive ? 'activated' : 'deactivated';
            $message = $isActive ? __('pages.success_activated') : __('pages.success_deactivated');

            return response()->json([
                'success' => true,
                'message' => $message,
                'is_active' => $isActive
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('pages.error_toggle') . ' ' . $e->getMessage()
            ], 500);
        }
    }
}
