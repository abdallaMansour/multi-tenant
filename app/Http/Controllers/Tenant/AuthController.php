<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Mail\CheckMail;
use App\Models\OtpCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function dashboard()
    {
        return view('Dashboard.tenants.index');
    }

    public function login()
    {
        return view('Dashboard.tenants.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:tenants,email',
        ]);

        // Delete any existing OTP for this email
        OtpCode::where('email', $request->email)->delete();

        $otpCode = random_int(1000, 9999);
        OtpCode::create([
            'email' => $request->email,
            'otp_code' => $otpCode,
            'expires_at' => now()->addMinutes(30)
        ]);

        Mail::to($request->email)->send(new CheckMail($request->email, $otpCode));

        // If it's an AJAX request, return JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json(['message' => 'OTP code sent to your email', 'status' => true]);
        }

        return redirect()->route('tenant.login')->with('success', 'OTP code sent to your email');
    }

    public function loginOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:otp_codes,email',
            'otp_code' => 'required|string|exists:otp_codes,otp_code',
        ]);

        $otpCode = OtpCode::where('email', $request->email)->where('otp_code', $request->otp_code)->first();

        if (!$otpCode || $otpCode->expires_at < now()) {
            $message = 'Invalid OTP code or expired';
            
            // If it's an AJAX request, return JSON
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json(['message' => $message, 'status' => false]);
            }
            
            return redirect()->route('tenant.login')->with('error', $message);
        }

        $otpCode->delete();

        // Find tenant by email and login
        $tenant = \App\Models\Tenant::where('email', $request->email)->first();
        if ($tenant) {
            Auth::guard('tenant')->login($tenant);
        }

        // If it's an AJAX request, return JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'Login successful', 
                'status' => true,
                'redirect_url' => route('tenant.dashboard')
            ]);
        }

        return redirect()->route('tenant.dashboard');
    }


    public function logout()
    {
        Auth::guard('tenant')->logout();
        return redirect()->route('tenant.login');
    }
}
