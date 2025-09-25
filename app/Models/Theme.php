<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\InteractsWithMedia;
class Theme extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = "themes";

    protected $fillable = [
        'business_activity_id',
        'title',
        'features',
        'price',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * Get the business activity that owns the theme.
     */
    public function businessActivity(): BelongsTo
    {
        return $this->belongsTo(BusinessActivity::class);
    }

    /**
     * Get the pages for the theme.
     */
    public function pages(): BelongsToMany
    {
        return $this->belongsToMany(Page::class, 'theme_pages');
    }

    /**
     * Scope a query to only include active themes.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include inactive themes.
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Scope a query to filter by business activity.
     */
    public function scopeForBusinessActivity($query, $businessActivityId)
    {
        return $query->where('business_activity_id', $businessActivityId);
    }
}
