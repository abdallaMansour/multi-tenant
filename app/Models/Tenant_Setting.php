<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant_Setting extends Model
{
    protected $table = "settings";

    public $timestamps = false;

    protected $fillable = [
        'type', // type like (text, image, file, etc)
        'label',
        'value'
    ];


}
