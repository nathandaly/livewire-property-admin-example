<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 * @property string $display_name
 * @property string $website
 */
class Developer extends Model
{
    use SoftDeletes;

    protected $perPage = 25;

    protected $fillable = [
        'name',
        'display_name',
        'website',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function regions()
    {
        return $this->hasMany(DeveloperRegion::class)->orderBy('region_name');
    }

    public function properties()
    {
        return $this->morphMany(Property::class, 'ownable');
    }

    public function developments()
    {
        return $this->hasMany(Development::class)->orderBy('development_name', 'asc');
    }

    public function getDisplayNameAttribute()
    {
        return $this->attributes['display_name'] ?? $this->attributes['name'];
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function getLogoAttribute()
    {
        return $this->media()->where('media_type', 'logo')->first();
    }
}
