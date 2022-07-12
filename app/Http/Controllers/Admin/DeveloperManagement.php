<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Developers\CreateDeveloperRequest;
use App\Http\Requests\Developers\UpdateDeveloperRequest;
use App\Services\CoreServicesApi\DevelopersApi;

class DeveloperManagement extends AdminController
{
    /**
     * @var DevelopersApi
     */
    protected $developers;

    public function __construct(DevelopersApi $developers)
    {
        $this->developers = $developers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'List Developers';
        $developers = $this->developers->index();

        return view('admin.developers.index', compact('developers', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Developer';

        return view('admin.developers.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDeveloperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDeveloperRequest $request)
    {
        $developer = $this->developers->create($request->all());

        if (isset($developer->id)) {
            return redirect(route('developers.index'))->with('status', 'Developer was created successfully!');
        }

        return redirect(route('developers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show Developer';
        $developer = $this->developers->retrieve($id);

        return view('admin.developers.show', compact('developer', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Developer';
        $developer = $this->developers->retrieve($id);

        return view('admin.developers.edit', compact('developer', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDeveloperRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeveloperRequest $request, $id)
    {
        $developer = $this->developers->update($id, $request->all());

        if (isset($developer->id)) {
            return redirect(route('developers.index'))->with('status', 'Developer was updated successfully!');
        }

        return redirect(route('developers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Delete Developer record
    }
}
