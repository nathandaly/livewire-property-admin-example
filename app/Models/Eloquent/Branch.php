<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $perPage = 25;

    protected $fillable = [
        'agent_id',
        'branch_ref',
        'branch_name',
        'telephone',
        'website',
        'email',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected $with = [
        'agent',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function getDisplayNameAttribute()
    {
        return $this->branch_name;
    }
}
