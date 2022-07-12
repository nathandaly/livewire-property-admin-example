<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Eloquent\OfcomBroadbandCheckResult;
use App\Models\Eloquent\EnergyPerformanceCertificate;
use App\Models\Eloquent\OfcomMobileCoverageCheckResult;
use Illuminate\Support\Arr;

class Property extends Model
{
    use SoftDeletes;

    protected $with = [
        'location',
    ];

    protected $fillable = [
        'paf_udp',
    ];

    public function location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function pricesPaid()
    {
        return $this->hasMany(PropertyRecord::class)->where('record_type', 'ppd');
    }

    public function energyPerformanceCertificates()
    {
        return $this->hasManyThrough(EnergyPerformanceCertificate::class, PropertyRecord::class, 'property_id', 'id', 'id', 'record_id')
            ->where('property_record.record_type', 'epc')
            ->orderBy('energy_performance_certificates.inspection_date', 'desc');
    }

    public function mobileNetworkCoverageResults()
    {
        return $this->hasManyThrough(OfcomMobileCoverageCheckResult::class, PropertyRecord::class, 'property_id', 'id', 'id', 'record_id')
            ->where('property_record.record_type', 'mobile')
            ->orderBy('ofcom_mobile_coverage_check_results.updated_at', 'desc');
    }

    public function broadbandCoverageResults()
    {
        return $this->hasManyThrough(OfcomBroadbandCheckResult::class, PropertyRecord::class, 'property_id', 'id', 'id', 'record_id')
            ->where('property_record.record_type', 'broadband')
            ->orderBy('ofcom_broadband_check_results.updated_at', 'desc');
    }

    public function adverts()
    {
        return $this->hasMany(PropertyAdvert::class);
    }

    public function profiles()
    {
        return $this->hasMany(PropertyProfile::class);
    }
}
