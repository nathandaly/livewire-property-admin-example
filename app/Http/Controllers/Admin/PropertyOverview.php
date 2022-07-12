<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PropertyOverview extends AdminController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin.properties.overview');
    }
}
