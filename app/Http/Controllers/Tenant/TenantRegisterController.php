<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Tenant;
use App\Mail\CheckMail;
use App\Models\OtpCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Service\DatabaseService;
use App\Models\DatabaseCredential;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Tenant\TenantRegisterCheckOtpRequest;
use App\Http\Requests\Tenant\TenantRegisterCheckMailRequest;
use App\Http\Requests\Tenant\TenantRegisterGetUserInfoRequest;

class TenantRegisterController extends Controller
{
    public function checkMail(TenantRegisterCheckMailRequest $request)
    {
        $validated = $request->validated();

        OtpCode::where('email', $validated['email'])->delete();

        $otpCode = random_int(1000, 9999);

        OtpCode::create([
            'email' => $validated['email'],
            'otp_code' => $otpCode,
            'expires_at' => now()->addMinutes(30)
        ]);

        Mail::to($validated['email'])->send(new CheckMail($validated['email'], $otpCode));

        return response()->json(['message' => __('tenant_registration.mail_sent'), 'status' => true]);
    }

    public function checkOtp(TenantRegisterCheckOtpRequest $request)
    {
        $validated = $request->validated();

        $otpCode = OtpCode::where('email', $validated['email'])->where('otp_code', $validated['otp_code'])->first();

        if (!$otpCode) {
            return response()->json(['message' => __('tenant_registration.invalid_otp'), 'status' => false]);
        }

        if ($otpCode->expires_at < now()) {
            return response()->json(['message' => __('tenant_registration.otp_expired'), 'status' => false]);
        }

        return response()->json(['message' => __('tenant_registration.email_verified'), 'status' => true]);
    }

    public function getUserInfo(TenantRegisterGetUserInfoRequest $request)
    {
        $validated = $request->validated();

        $databaseCredential = DatabaseCredential::where('tenant_id', null)->first();

        if (!$databaseCredential)
            return response()->json(['message' => __('tenant_registration.no_database_credential'), 'status' => false]);

        try {
            DB::beginTransaction();

            $otpCode = OtpCode::where('email', $validated['email'])->where('otp_code', $validated['otp_code'])->first();

            if (!$otpCode || $otpCode->expires_at < now())
                return response()->json(['message' => __('tenant_registration.invalid_otp_expired'), 'status' => false]);


            $otpCode->delete();

            $username = Str::slug($validated['name']);

            if ($username == 'admin' || Tenant::where('username', $username)->exists())
                return response()->json(['message' => __('tenant_registration.username_exists'), 'status' => false]);

            $tenant = Tenant::create([
                'name' => $validated['name'],
                'username' => $username,
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'business_activity_id' => $validated['business_activity_id'],
                'main_language' => $validated['main_language'],
                'sub_language' => $validated['sub_language'],
                // 'admin_main_language' => $validated['admin_main_language'],
                'default_lang' => $validated['default_lang'],
                'admin_sub_language' => $validated['admin_sub_language'],
                'email_verified_at' => now(),
                'is_active' => false,
            ]);

            DB::commit();
            DatabaseService::createTenantDatabase($tenant, $databaseCredential);

            return response()->json(['message' => __('tenant_registration.registration_completed'), 'status' => true, 'username' => $username]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage(), 'status' => false]);
        }
    }
}
