<?php

namespace App\Http\Controllers\Developments;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Development;
use Illuminate\Http\Request;

class DevelopmentDashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Development  $development
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Development $development)
    {
        // TODO: Check the logged in user has access to this Development

        return view('developments.dashboard', compact('development'));
    }
}
