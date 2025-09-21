<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant_Setting;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function settings()
    {
        $query = tenantConnectionDatabase();

        // Get all settings from the database
        $settings = Tenant_Setting::on($query)->get();

        return view('Dashboard.tenants.settings.settings', compact('settings'));
    }

    public function settingsPost(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.*.id' => 'required|integer',
            'settings.*.value' => 'required',
        ]);

        try {
            $query = tenantConnectionDatabase();

            foreach ($request->settings as $index => $settingData) {
                $setting = Tenant_Setting::on($query)->find($settingData['id']);
                if ($setting) {
                    $value = $settingData['value'];

                    // Handle file uploads
                    if ($setting->type === 'file' && $request->hasFile("settings.{$index}.value")) {
                        $file = $request->file("settings.{$index}.value");

                        // delete old file
                        if ($setting->value) {
                            Storage::disk('public')->delete($setting->value);
                        }

                        // Store file in storage/app/public
                        $filename = Storage::disk('public')->put('/', $file);

                        // Update setting with filename
                        $setting->update(['value' => $filename]);
                    } else {
                        // Handle regular text inputs
                        $setting->update(['value' => $value]);
                    }
                }
            }

            return redirect()->back()->with('success', 'Settings updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update settings: ' . $e->getMessage());
        }
    }

    public function addSetting(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:1000',
        ]);

        try {
            $query = tenantConnectionDatabase();
            Tenant_Setting::on($query)->create([
                'label' => $request->label,
                'type' => $request->type,
                'value' => $request->value,
            ]);

            return redirect()->back()->with('success', 'Setting added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add setting: ' . $e->getMessage());
        }
    }
}
