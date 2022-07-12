<?php

namespace App\Http\Controllers\Branches;

use Illuminate\Http\Request;
use App\Models\Eloquent\Branch;
use App\Http\Controllers\Controller;

class BranchDashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Branch $branch)
    {
        // TODO: Check the logged in User has access to this Branch

        return view('branches.dashboard', compact('branch'));
    }
}
