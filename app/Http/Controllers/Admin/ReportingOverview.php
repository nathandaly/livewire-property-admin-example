<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ReportingOverview extends AdminController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin.reports.overview');
    }
}
