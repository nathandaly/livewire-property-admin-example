<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use SoftDeletes;

    protected $perPage = 25;

    protected $fillable = [
        'company_name',
        'website',
        'description',
    ];

    protected $appends = [
        'display_name',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function getDisplayNameAttribute()
    {
        return $this->company_name;
    }
}
