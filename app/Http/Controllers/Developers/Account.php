<?php

namespace App\Http\Controllers\Developers;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Developer;
use Illuminate\Http\Request;

class Account extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Developer $developer)
    {
        return view('developers.account', compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Developer  $developer
     * @return void
     */
    public function update(Request $request, Developer $developer)
    {
        $data = $request->validate([
            'display_name' => ['required', 'string'],
            'website' => ['url'],
        ]);

        $developer->display_name = $data['display_name'];
        $developer->website = $data['website'];
        $developer->save();

        return redirect(route('developer.account', ['developer' => $developer]))->with('status', 'Account details updated');
    }
}
