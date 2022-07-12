<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Pages\CreatePageRequest;
use App\Http\Requests\Pages\UpdatePageRequest;
use App\Services\CoreServicesApi\PagesApi;

class PageManagement extends AdminController
{
    /**
     * @var PagesApi
     */
    protected $pages;

    public function __construct(PagesApi $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  PagesApi  $pages
     * @return \Illuminate\Http\Response
     */
    public function index(PagesApi $pages)
    {
        $pageTitle = 'List Pages';
        $pages = $this->pages->index();

        return view('admin.pages.index', compact('pages', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Page';

        return view('admin.pages.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePageRequest $request)
    {
        $page = $this->pages->create($request->all());

        if (isset($page->id)) {
            return redirect(route('pages.index'))->with('status', 'Page was created successfully!');
        }

        return redirect(route('pages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show Page';
        $page = $this->pages->retrieve($id);

        return view('admin.pages.show', compact('page', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Page';
        $page = $this->pages->retrieve($id);

        return view('admin.pages.edit', compact('page', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $page = $this->pages->update($id, $request->all());

        if (isset($page->id)) {
            return redirect(route('pages.index'))->with('status', 'Page was updated successfully!');
        }

        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Delete Page record
    }
}
