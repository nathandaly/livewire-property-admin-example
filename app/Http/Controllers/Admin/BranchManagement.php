<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Branches\CreateBranchRequest;
use App\Http\Requests\Branches\UpdateBranchRequest;
use App\Services\CoreServicesApi\AgentsApi;
use App\Services\CoreServicesApi\BranchesApi;

class BranchManagement extends AdminController
{
    /**
     * @var BranchesApi
     */
    protected $branches;

    /**
     * @var AgentsApi
     */
    protected $agents;

    public function __construct(BranchesApi $branches, AgentsApi $agents)
    {
        $this->branches = $branches;
        $this->agents = $agents;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'List Branches';
        $branches = $this->branches->index();

        return view('admin.branches.index', compact('branches', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Branch';
        $agents = $this->agents->index();

        return view('admin.branches.create', compact('agents', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBranchRequest $request)
    {
        $branch = $this->branches->create($request->all());

        if (isset($branch->id)) {
            return redirect(route('branches.index'))->with('status', 'Branch was created successfully!');
        }

        return redirect(route('branches.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show Branch';
        $branch = $this->branches->retrieve($id);

        return view('admin.branches.show', compact('branch', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Branch';
        $branch = $this->branches->retrieve($id);
        $agents = $this->agents->index();

        return view('admin.branches.edit', compact('branch', 'agents', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBranchRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, $id)
    {
        $branch = $this->branches->update($id, $request->all());

        if (isset($branch->id)) {
            return redirect(route('branches.index'))->with('status', 'Branch was updated successfully!');
        }

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Delete Branch record
    }
}
