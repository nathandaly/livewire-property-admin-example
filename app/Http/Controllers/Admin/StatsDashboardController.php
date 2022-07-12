<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Property;
use App\Models\Eloquent\PropertyProfile;
use App\User;
use Illuminate\Http\Request;

class StatsDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $propertyCount = Property::count();
        $withMobile    = Property::whereHas('mobileNetworkCoverageResults')->count();
        $withBroadband = Property::whereHas('broadbandCoverageResults')->count();
        $withPpd       = Property::whereHas('pricesPaid')->count();
        $withEpc       = Property::whereHas('energyPerformanceCertificates')->count();

        $kpis = [
            'total_users'       => User::count(),
            'verified_users'    => User::whereNotNull('email_verified_at')->count(),
            'attempted_claims'  => PropertyProfile::count(),
            'linked_claims'     => PropertyProfile::whereNotNull('owner_type')->count(),
            'chat_one_question' => PropertyProfile::whereNotNull('property_type')->count(),
            'chat_complete'     => PropertyProfile::whereNotNull('owner_status')->count(),
        ];

        $propertyStats = [
            'total_properties'        => $propertyCount,
            'with_prices_paid'        => round(($withPpd / $propertyCount) * 100, 1) . '%',
            'with_epc_data'           => round(($withEpc / $propertyCount) * 100, 1) . '%',
            'with_mobile_coverage'    => round(($withMobile / $propertyCount) * 100, 1) . '%',
            'with_broadband_coverage' => round(($withBroadband / $propertyCount) * 100, 1) . '%',
        ];

        return view('admin.stats.overview', compact('kpis', 'propertyStats'));
    }
}
