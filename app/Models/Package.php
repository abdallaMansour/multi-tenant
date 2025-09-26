<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "packages";

    protected $fillable = [
        'name',
        'is_active',
        'trial_days',
        'plan',
        'price',
        'features',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'trial_days' => 'integer',
        'plan' => 'string',
        'price' => 'decimal:2',
        'features' => 'array',
    ];

    /**
     * Scope a query to only include active packages.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include inactive packages.
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
}
