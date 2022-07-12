<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyProfileArea extends Model
{
    use SoftDeletes;

    protected $with = [
        'items',
    ];

    public function profile()
    {
        return $this->belongsTo(PropertyProfile::class);
    }

    public function items()
    {
        return $this->hasMany(PropertyProfileItem::class);
    }
}
