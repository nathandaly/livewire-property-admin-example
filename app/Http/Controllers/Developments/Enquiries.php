<?php

namespace App\Http\Controllers\Developments;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Development;
use App\Models\Eloquent\PropertyEnquiry;
use Illuminate\Http\Request;

class Enquiries extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Development  $development
     * @return \Illuminate\Http\Response
     */
    public function index(Development $development)
    {
        $enquiries = $development->enquiries;

        return view('developments.enquiries.index', compact('development', 'enquiries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Development $development, PropertyEnquiry $enquiry)
    {
        return view('developments.enquiries.show', compact('development', 'enquiry'));
    }
}
