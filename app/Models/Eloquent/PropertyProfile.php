<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyProfile extends Model
{
    use SoftDeletes;

    protected $casts = [
        'feature_points' => 'array',
    ];

    protected $fillable = [
        'property_id',
        'owner_type',
        'owner_id',
        'summary',
        'description',
        'feature_points',
        'bedrooms',
        'bathrooms',
        'reception_rooms',
        'parking',
        'outside_space',
        'year_built',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function areas()
    {
        return $this->hasMany(PropertyProfileArea::class);
    }

    public function getImagesAttribute()
    {
        return $this->media()->where('media_type', 'image')->get()->toArray();
    }

    public function files()
    {
        return $this->hasMany(VaultFile::class, 'property_id');
    }

    public function reminders()
    {
        return $this->morphMany(Reminder::class, 'remindable')->orderBy('reminder_date', 'asc');
    }
}
