<?php

namespace App\Http\Controllers\Developers;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Developer;
use Illuminate\Http\Request;

class Developments extends Controller
{
    /**
     * @param  Request  $request
     * @param  Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Developer $developer)
    {
        $regions = $developer->regions;
        $developments = $developer->developments();
        $region_id = $request->get('region_id');

        if ($region_id !== null) {
            $developments->where('developer_region_id', $region_id);
        }

        $developments = $developments->paginate();

        return view('developers.developments', compact('developer', 'regions', 'developments', 'region_id'));
    }
}
