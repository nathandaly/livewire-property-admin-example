<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;

class PropertyAdvert extends Model
{
    use SoftDeletes;
    use Searchable;

    const LISTING_TYPE_MAPPINGS = [
        'sale' => 'For Sale',
        'rent' => 'To Rent',
    ];

    protected $with = [
        'location',
        'media',
    ];

    protected $casts = [
        'feature_points' => 'array',
    ];

    protected $fillable = [
        'contactable_id',
        'contactable_type',
        'agent_reference',
        'published',
        'featured',
        'status',
        'property_type',
        'listing_type',
        'scheduled_for_deletion',
        'property_id',
        'summary',
        'description',
        'feature_points',
        'bedrooms',
        'bathrooms',
        'reception_rooms',
        'parking',
        'outside_space',
        'year_built',
        'price',
        'price_qualifier',
        'new_home',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function contactable()
    {
        return $this->morphTo();
    }

    public function getImagesAttribute()
    {
        return $this->media()->where('media_type', 'image')->get()->toArray();
    }

    public function getPriceFormattedAttribute()
    {
        return number_format($this->price);
    }

    public function getListingTypeFormattedAttribute()
    {
        return Arr::get(self::LISTING_TYPE_MAPPINGS, $this->attributes['listing_type']);
    }

    public function toSearchableArray()
    {
        // TODO: This could probably be extracted to a Transformer class?
        $record = $this->toArray();

        if ($this->location !== null && $this->location->latitude !== null && $this->location->longitude !== null) {
            $record['_geoloc'] = [
                'lat' => $this->location->latitude,
                'lng' => $this->location->longitude,
            ];
        }

        $record['location'] = Arr::only($record['location'], ['address_1', 'address_2', 'address_2', 'address_4', 'town', 'postcode_outcode', 'postcode_incode']);

        $record['description'] = strip_tags($record['description']);

        // Remove data we don't want indexed
        unset($record['created_at'], $record['updated_at'], $record['deleted_at']);
        unset($record['contactable']);
        unset($record['media']);

        return $record;
    }
}
