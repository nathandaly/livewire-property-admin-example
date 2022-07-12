<?php

namespace App\Http\Controllers\Agents;

use Illuminate\Http\Request;
use App\Models\Eloquent\Agent;
use App\Http\Controllers\Controller;

class AgentDashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Agent $agent)
    {
        // TODO: Check the logged in User has access to this Agent

        return view('agents.dashboard', compact('agent'));
    }
}
