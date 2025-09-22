<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'is_active',
        'email_verified_at',
        'business_activity_id',
        'main_language',
        'sub_language',
        'admin_main_language',
        'admin_sub_language',
    ];

    // protected $hidden = [
    //     // 'password',
    // ];

    protected $casts = [
        'password' => 'hashed',
        'is_active' => 'boolean',
        'sub_language' => 'array',
        'admin_sub_language' => 'array',
    ];

    // Relationships
    public function databaseCredential()
    {
        return $this->hasOne(DatabaseCredential::class);
    }
}
