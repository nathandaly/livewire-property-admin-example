<?php

namespace App\Models\Eloquent;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eloquent\PropertyProfile;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaultFile extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function share(User $user)
    {
        $this->users()->attach($user);
    }

    public function revoke(User $user)
    {
        $this->users()->detach($user);
    }

    public function getFileTypeHumanAttribute()
    {
        return preg_replace('/(?<!\ )[A-Z]/', ' $0', $this->attributes['file_type']);
    }

    public function getFileTypeAbbreviatedAttribute()
    {
        return substr(preg_replace('~[^A-Z]~', '', $this->attributes['file_type']), 0, 2);
    }

    public function property()
    {
        return $this->belongsTo(PropertyProfile::class, 'property_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function meta()
    {
        return $this->morphTo();
    }
}
