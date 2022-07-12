<?php

namespace App\Http\Controllers\Developers;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Area;
use App\Models\Eloquent\Developer;
use App\Models\Eloquent\DeveloperRegion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Regions extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function index(Developer $developer)
    {
//        Gate::authorize('view developer-regions');

        $regions = $developer->regions;
        $areas = Area::all();

        return view('developers.regions.index', compact('developer', 'regions', 'areas'));
    }

    public function update(Request $request, Developer $developer, DeveloperRegion $region)
    {
//        Gate::authorize('edit developer-regions');

        // TODO: check the region belongs to this developer, and that the user has permission to access this developer

        $data = $request->validate([
            'area_id' => ['required', 'integer', 'exists:areas,id'],
        ]);

        $region->area_id = $data['area_id'];
        $region->save();

        return redirect(route('developer.regions.index', ['developer' => $developer]))->with('status', 'Region was updated');
    }
}
