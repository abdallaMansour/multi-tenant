<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatabaseCredential extends Model
{
    protected $table = "database_credentials";

    protected $fillable = [
        'db_name',
        'db_user', 
        'db_password',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get only active credentials
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get only inactive credentials
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
}
