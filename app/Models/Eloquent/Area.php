<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    protected $perPage = 25;

    protected $fillable = [
        'slug',
        'area_name',
        'ons_code',
        'page_content',
        'page_order',
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
