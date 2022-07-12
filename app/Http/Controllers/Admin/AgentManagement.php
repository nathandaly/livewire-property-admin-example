<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Agents\CreateAgentRequest;
use App\Http\Requests\Agents\UpdateAgentRequest;
use App\Services\CoreServicesApi\AgentsApi;

class AgentManagement extends AdminController
{
    /**
     * @var AgentsApi
     */
    private $agents;

    public function __construct(AgentsApi $agents)
    {
        $this->agents = $agents;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'List Agents';
        $agents = $this->agents->index();

        return view('admin.agents.index', compact('agents', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Agent';

        return view('admin.agents.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAgentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAgentRequest $request)
    {
        $agent = $this->agents->create($request->all());

        if (isset($agent->id)) {
            return redirect(route('agents.index'))->with('status', 'Agent was created successfully!');
        }

        return redirect(route('agents.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show Agent';
        $agent = $this->agents->retrieve($id);

        return view('admin.agents.show', compact('agent', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Agent';
        $agent = $this->agents->retrieve($id);

        return view('admin.agents.edit', compact('agent', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAgentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgentRequest $request, $id)
    {
        $agent = $this->agents->update($id, $request->all());

        if (isset($agent->id)) {
            return redirect(route('agents.index'))->with('status', 'Agent was updated successfully!');
        }

        return redirect(route('agents.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Delete Agent record
    }
}
