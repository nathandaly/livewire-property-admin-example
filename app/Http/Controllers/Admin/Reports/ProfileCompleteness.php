<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;
use App\Models\Eloquent\PropertyProfile;
use App\Http\Controllers\Admin\AdminController;

class ProfileCompleteness extends AdminController
{
    public function __invoke(Request $request)
    {
        $profiles = PropertyProfile::whereNotNull('owner_id')->with([
            'property',
            'media',
            'files',
            'reminders',
            'property.pricesPaid',
            'property.energyPerformanceCertificates',
            'property.mobileNetworkCoverageResults',
            'property.broadbandCoverageResults',
        ])->latest()->paginate(25);

        return view('admin.reports.profile-completeness', [
            'profiles' => $profiles,
        ]);
    }
}
