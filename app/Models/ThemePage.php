<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThemePage extends Model
{
    protected $table = 'theme_pages';

    protected $fillable = [
        'theme_id',
        'page_id'
    ];

    /**
     * Get the theme that owns the theme page.
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Get the page that owns the theme page.
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
