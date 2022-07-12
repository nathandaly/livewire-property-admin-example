<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyProfileItem extends Model
{
    use SoftDeletes;

    public function area()
    {
        return $this->belongsTo(PropertyProfileArea::class);
    }
}
