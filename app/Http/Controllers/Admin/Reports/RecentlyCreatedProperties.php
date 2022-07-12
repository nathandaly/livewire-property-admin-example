<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use App\Models\Eloquent\Property;
use App\Http\Controllers\Admin\AdminController;

class RecentlyCreatedProperties extends AdminController
{
    public function __invoke(Request $request)
    {
        $properties = Property::with([
            'pricesPaid',
            'energyPerformanceCertificates',
            'mobileNetworkCoverageResults',
            'broadbandCoverageResults',
        ])->latest()->paginate(25);

        return view('admin.reports.recently-created-properties', [
            'properties' => $properties,
        ]);
    }
}
