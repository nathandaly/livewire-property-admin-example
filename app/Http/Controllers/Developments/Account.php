<?php

namespace App\Http\Controllers\Developments;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Development;
use Illuminate\Http\Request;

class Account extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Development  $development
     * @return \Illuminate\Http\Response
     */
    public function index(Development $development)
    {
        return view('developments.account', compact('development'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Development  $development
     * @return void
     */
    public function update(Request $request, Development $development)
    {
        $data = $request->validate([
            'development_name' => ['required', 'string'],
            'price_min'        => ['int'],
            'price_max'        => ['int'],
            'telephone'        => ['required', 'string'],
            'email'            => ['required', 'email'],
            'opening_hours'    => ['string'],
            'description'      => ['string'],
        ]);

        $development->development_name = $data['development_name'];
        $development->price_min = $data['price_min'];
        $development->price_max = $data['price_max'];
        $development->telephone = $data['telephone'];
        $development->email = $data['email'];
        $development->opening_hours = $data['opening_hours'];
        $development->description = $data['description'];
        $development->save();

        return redirect(route('development.account', ['development' => $development]))->with('status', 'Account details updated');
    }
}
