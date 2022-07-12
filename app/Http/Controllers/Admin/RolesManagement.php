<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view roles');

        $pageTitle = 'List Roles';
        $roles = Role::with('permissions')->get();

        return view('admin.roles.index', compact('pageTitle', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Gate::authorize('create roles');

        Role::create(['name' => $request->get('name')]);

        return redirect(route('roles.index'))->with('status', 'Role created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('edit roles');

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('edit roles');

        $permissions = collect($request->get('permission'))->keys();
        $role->syncPermissions($permissions);

        return redirect(route('roles.index'))->with('status', 'Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        Gate::authorize('delete roles');

        $role->delete();

        return redirect(route('roles.index'))->with('status', 'Role deleted!');
    }
}
