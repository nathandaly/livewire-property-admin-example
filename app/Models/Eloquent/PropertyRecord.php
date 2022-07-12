<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PropertyRecord extends Pivot
{
    protected $fillable = [
        'property_id',
        'record_type',
        'record_id',
    ];

    protected $with = [
        'record',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function record()
    {
        return $this->morphTo('record');
    }
}
