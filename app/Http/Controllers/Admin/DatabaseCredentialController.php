<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\DatabaseCredential;

class DatabaseCredentialController extends Controller
{
    /**
     * Display a listing of database credentials
     */
    public function index(Request $request): View
    {
        $credentials = DatabaseCredential::orderBy('created_at', 'desc')->paginate(10);

        return view('Dashboard.dist.database-credentials.database-credentials', compact('credentials'));
    }

    /**
     * Store a newly created database credential
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'db_name' => 'required|string|max:255',
            'db_user' => 'required|string|max:255',
            'db_password' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();
            // $database_prefix = \Plugin\Saas\Repositories\SettingsRepository::getSaasSetting('database_prefix');
            $database_prefix = '';
            if (!empty($database_prefix)) {
                $db_name = $database_prefix . '_' . $request->db_name;
                $db_user = $database_prefix . '_' . $request->db_user;
            } else {
                $db_name = $request->db_name;
                $db_user = $request->db_user;
            }
            DatabaseCredential::create([
                'db_name' => $db_name,
                'db_user' => $db_user,
                'db_password' => $request->db_password,
                'tenant_id' => null
            ]);

            DB::commit();
            return redirect()->route('database-credentials')->with('success', 'Database credential created successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to create database credential!');
        }
    }

    /**
     * Update the specified database credential
     */
    public function update(Request $request, DatabaseCredential $databaseCredential): RedirectResponse
    {
        $request->validate([
            'db_name' => 'required|string|max:255',
            'db_user' => 'required|string|max:255',
            'db_password' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();
            // $database_prefix = \Plugin\Saas\Repositories\SettingsRepository::getSaasSetting('database_prefix');

            // if ($database_prefix) {
            //     $db_name = Str::startsWith($database_prefix, $request->db_name) ? $request->db_name : $database_prefix . '_' . $request->db_name;
            //     $db_user = Str::startsWith($database_prefix, $request->db_user) ? $request->db_user : $database_prefix . '_' . $request->db_user;
            // } else {
            //     $db_name = $request->db_name;
            //     $db_user = $request->db_user;
            // }

            $databaseCredential->update([
                'db_name' => $request->db_name,
                'db_user' => $request->db_user,
                'db_password' => $request->db_password,
                // 'tenant_id' => null
            ]);

            DB::commit();
            return redirect()->route('database-credentials')->with('success', 'Database credential updated successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to update database credential!');
        }
    }

    /**
     * Remove the specified database credential
     */
    public function destroy(DatabaseCredential $databaseCredential): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $databaseCredential->delete();

            DB::commit();
            return redirect()->route('database-credentials')->with('success', 'Database credential deleted successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Unable to delete database credential!');
        }
    }
}
