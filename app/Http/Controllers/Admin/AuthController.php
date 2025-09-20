<?php
namespace App\Http\Controllers\Admin;

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
        return view('Dashboard.dist.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('login')->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
