<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'address_1',
        'address_2',
        'address_3',
        'address_4',
        'town',
        'postcode_outcode',
        'postcode_incode',
        'display_address',
        'latitude',
        'longitude',
    ];

    public function locationable()
    {
        return $this->morphTo();
    }
}
