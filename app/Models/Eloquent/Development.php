<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $developer_id
 * @property int $developer_region_id
 * @property string $development_name
 * @property string $development_code
 * @property int $price_min
 * @property int $price_max
 * @property string $telephone
 * @property string $email
 * @property string $opening_hours
 * @property string $description
 */
class Development extends Model
{
    use SoftDeletes;

    protected $perPage = 25;

    protected $with = [
        'region',
        'developer',
    ];

    protected $fillable = [
        'developer_id',
        'developer_region_id',
        'development_name',
        'development_code',
        'price_min',
        'price_max',
        'telephone',
        'email',
        'opening_hours',
        'description',
    ];

    public function location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function properties()
    {
        return $this->morphMany(PropertyAdvert::class, 'contactable');
    }

    public function profiles()
    {
        return $this->morphMany(PropertyProfile::class, 'owner');
    }

    public function enquiries()
    {
        return $this->morphMany(PropertyEnquiry::class, 'contactable');
    }

    public function region()
    {
        return $this->belongsTo(DeveloperRegion::class, 'developer_region_id');
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function getDisplayNameAttribute()
    {
        return $this->development_name;
    }
}
