<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyEnquiry extends Model
{
    use SoftDeletes;

    protected $dates = [
        'forwarded_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'message_data' => 'object',
    ];

    public function advert()
    {
        return $this->belongsTo(PropertyAdvert::class);
    }

    public function contactable()
    {
        return $this->morphTo();
    }
}
