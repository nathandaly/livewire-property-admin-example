<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Services\CoreServicesApi\UsersApi;
use App\User;

class UserManagement extends AdminController
{
    /**
     * @var UsersApi
     */
    protected $users;

    public function __construct(UsersApi $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'List Users';
        $users = User::paginate(25);

        return view('admin.users.index', compact('users', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create User';

        return view('admin.users.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->users->create($request->all());

        if (isset($user->id)) {
            return redirect(route('users.index'))->with('status', 'User was created successfully!');
        }

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show User';
        $user = $this->users->retrieve($id);

        return view('admin.users.show', compact('user', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit User';
        $user = $this->users->retrieve($id);

        return view('admin.users.edit', compact('user', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->users->update($id, $request->all());

        if (isset($user->id)) {
            return redirect(route('users.index'))->with('status', 'User was updated successfully!');
        }

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Delete the User
    }
}
