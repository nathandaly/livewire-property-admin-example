<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeveloperRegion extends Model
{
    use SoftDeletes;

    protected $perPage = 25;

    protected $fillable = [
        'developer_id',
        'area_id',
        'region_name',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected $with = [
        'developer',
        'area',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class)->withTrashed();
    }

    public function area()
    {
        return $this->belongsTo(Area::class)->withTrashed();
    }
}
