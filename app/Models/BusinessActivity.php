<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class BusinessActivity extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = "business_activities";

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_active'
    ];

    public function requirements()
    {
        return $this->hasMany(BusinessActivityRequirement::class);
    }
}
