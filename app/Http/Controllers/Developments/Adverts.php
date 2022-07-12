<?php

namespace App\Http\Controllers\Developments;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Development;
use App\Models\Eloquent\PropertyAdvert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Adverts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Development  $development
     * @return \Illuminate\Http\Response
     */
    public function index(Development $development)
    {
        $adverts = $development->properties;

        return view('developments.adverts.index', compact('development', 'adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Show "create advert" interface (for developers without feeds)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: "create advert" handler (for developers without feeds)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Development  $development
     * @param  PropertyAdvert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Development $development, PropertyAdvert $advert)
    {
        return view('developments.adverts.edit', compact('development', 'advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO: "Update Advert" handler
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Development  $development
     * @param  PropertyAdvert  $advert
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Development $development, PropertyAdvert $advert)
    {
        Gate::authorize('delete adverts');

        $advert->delete();

        return redirect(route('development.adverts.index', ['development' => $development]))->with('status', 'Advert was deleted.');
    }
}
