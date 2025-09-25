<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = "pages";

    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active pages.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include inactive pages.
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'theme_pages');
    }
}
