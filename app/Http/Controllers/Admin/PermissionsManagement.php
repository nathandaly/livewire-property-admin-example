<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionsManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view permissions');

        $pageTitle = 'List Permissions';
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('pageTitle', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Gate::authorize('create permissions');

        Permission::create(['name' => $request->get('name')]);

        return redirect(route('permissions.index'))->with('status', 'Permission created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        Gate::authorize('delete permissions');

        $permission->delete();

        return redirect(route('permissions.index'))->with('status', 'Permission deleted!');
    }
}
