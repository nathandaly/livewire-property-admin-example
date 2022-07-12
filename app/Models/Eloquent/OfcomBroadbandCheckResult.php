<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfcomBroadbandCheckResult extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getFastestAvailableAttribute()
    {
        if ($this->max_ufbb_predicted_down > 0) {
            return 'Ultrafast';
        } elseif ($this->max_sfbb_predicted_down > 0) {
            return 'Superfast';
        } elseif ($this->max_bb_predicted_down > 0) {
            return 'Broadband';
        }

        return 'Data Not Available';
    }
}
