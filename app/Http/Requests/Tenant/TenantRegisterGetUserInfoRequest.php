<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class TenantRegisterGetUserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'business_activity_id' => 'required|exists:business_activities,id',
            'main_language' => 'required|string|max:255',
            'sub_language' => 'required|array|min:1', // sub language is multiple
            // 'admin_main_language' => 'required|string|max:255',
            'default_lang' => 'required|string|max:255',
            'admin_sub_language' => 'required|array|min:1', // admin sub language is multiple
            'otp_code' => 'required|string|exists:otp_codes,otp_code',
        ];
    }
}
