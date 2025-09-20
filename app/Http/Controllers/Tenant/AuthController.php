<?php
namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard()
    {
        return view('Dashboard.dist.index');
    }

    public function login()
    {
        return view('Dashboard.dist.tenant-login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:tenants,email',
            'password' => 'required',
        ]);

        if (Auth::guard('tenant')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('tenant.dashboard');
        }

        return redirect()->route('tenant.login')->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Auth::guard('tenant')->logout();
        return redirect()->route('tenant.login');
    }
}
