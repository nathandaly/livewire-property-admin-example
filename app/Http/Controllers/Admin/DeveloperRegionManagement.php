<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DeveloperRegions\CreateRegionRequest;
use App\Http\Requests\DeveloperRegions\UpdateRegionRequest;
use App\Services\CoreServicesApi\AreasApi;
use App\Services\CoreServicesApi\DeveloperRegionsApi;
use App\Services\CoreServicesApi\DevelopersApi;

class DeveloperRegionManagement extends AdminController
{
    /**
     * @var DeveloperRegionsApi
     */
    protected $regions;

    /**
     * @var DevelopersApi
     */
    protected $developers;

    /**
     * @var AreasApi
     */
    protected $areas;

    public function __construct(DeveloperRegionsApi $regions, DevelopersApi $developers, AreasApi $areas)
    {
        $this->regions = $regions;
        $this->developers = $developers;
        $this->areas = $areas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'List Developer Regions';
        $regions = $this->regions->index();

        return view('admin.developer-regions.index', compact('regions', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Developer Region';
        $developers = $this->developers->index();
        $areas = $this->areas->index();

        return view('admin.developer-regions.create', compact('developers', 'areas', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRegionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRegionRequest $request)
    {
        $region = $this->regions->create($request->all());

        if (isset($region->region_id)) {
            return redirect(route('developer-regions.index'))->with('status', 'Region was created successfully!');
        }

        return redirect(route('developer-regions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show Developer Region';
        $region = $this->regions->retrieve($id);

        return view('admin.developer-regions.show', compact('region', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Developer Region';
        $region = $this->regions->retrieve($id);
        $developers = $this->developers->index();
        $areas = $this->areas->index();

        return view('admin.developer-regions.edit', compact('region', 'developers', 'areas', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, $id)
    {
        $region = $this->regions->update($id, $request->all());

        if (isset($region->region_id)) {
            return redirect(route('developer-regions.index'))->with('status', 'Region was updated successfully!');
        }

        return redirect(route('developer-regions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Delete Developer Area record
    }
}
