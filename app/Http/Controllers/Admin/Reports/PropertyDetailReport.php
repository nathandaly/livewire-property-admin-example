<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\EnergyPerformanceCertificate;
use App\Models\Eloquent\OfcomBroadbandCheckResult;
use App\Models\Eloquent\OfcomMobileCoverageCheckResult;
use App\Models\Eloquent\PricePaidData;
use App\Models\Eloquent\Property;
use Illuminate\Http\Request;

class PropertyDetailReport extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Property  $property
     * @return void
     */
    public function __invoke(Request $request, Property $property)
    {
        $ppds = PricePaidData::where('outcode', $property->outcode)
            ->where('incode', $property->incode)
            ->orderBy('transfer_date', 'desc')
            ->get();

        $epcs = EnergyPerformanceCertificate::where('outcode', $property->outcode)
            ->where('incode', $property->incode)
            ->orderBy('inspection_date', 'desc')
            ->get();

        $cleanPostcode  = $property->outcode . $property->incode;
        $ofcomMobile    = OfcomMobileCoverageCheckResult::where('post_code', $cleanPostcode)->get();
        $ofcomBroadband = OfcomBroadbandCheckResult::where('post_code', $cleanPostcode)->get();

        return view('admin.reports.property-detail', compact('property', 'ppds', 'epcs', 'ofcomMobile', 'ofcomBroadband'));
    }
}
