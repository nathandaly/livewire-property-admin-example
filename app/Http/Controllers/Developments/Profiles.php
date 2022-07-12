<?php

namespace App\Http\Controllers\Developments;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Development;
use App\Models\Eloquent\PropertyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Profiles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Development  $development
     * @return \Illuminate\Http\Response
     */
    public function index(Development $development)
    {
        Gate::authorize('view profiles');

        $profiles = $development->profiles;

        return view('developments.profiles.index', compact('development', 'profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Show "Create Profile" interface
        Gate::authorize('create profiles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: "Create Profile" handler
        Gate::authorize('create profiles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Development $development, PropertyProfile $profile)
    {
        Gate::authorize('edit profiles');

        return view('developments.profiles.edit', compact('development', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Development  $development
     * @param  PropertyProfile  $profile
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function update(Development $development, PropertyProfile $profile, Request $request)
    {
        Gate::authorize('edit profiles');

        $profile->profile_status = $request->get('profile_status');
        $profile->property_type = $request->get('property_type');
        $profile->bedrooms = $request->get('bedrooms');
        $profile->bathrooms = $request->get('bathrooms');
        $profile->reception_rooms = $request->get('reception_rooms');
        $profile->parking = $request->get('parking');
        $profile->summary = $request->get('summary');
        $profile->description = $request->get('description');
        $profile->feature_points = collect($request->get('feature_points', []))->filter()->values();
        if (! $profile->year_built && $request->has('year_built')) {
            $profile->year_built = $request->get('year_built');
        }
        $profile->save();

        $location = $profile->property->location;
        $location->display_address = $request->get('display_address');
        $location->latitude = $request->get('latitude');
        $location->longitude = $request->get('longitude');
        $location->save();

        return redirect(route('development.profiles.edit', ['development' => $development, 'profile' => $profile]))->with('status', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Development  $development
     * @param  PropertyProfile  $profile
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Development $development, PropertyProfile $profile)
    {
        Gate::authorize('delete profiles');

        $profile->delete();

        return redirect(route('development.profiles.index', ['development' => $development]))->with('status', 'Profile was deleted');
    }
}
