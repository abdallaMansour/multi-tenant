<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessActivityRequirement extends Model
{
    protected $table = "business_activity_requirements";

    public $timestamps = false;

    protected $fillable = [
        'business_activity_id',
        'label',
        'type',
        'is_required'
    ];

    public function businessActivity()
    {
        return $this->belongsTo(BusinessActivity::class);
    }
}
