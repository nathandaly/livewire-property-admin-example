<?php

namespace App\Http\Controllers\Developers;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Developer;
use Illuminate\Http\Request;

class DeveloperDashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Developer $developer)
    {
        // TODO: Check the logged in user has access to this Developer

        return view('developers.dashboard', compact('developer'));
    }
}
