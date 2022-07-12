@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Roles Management
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th>Role ID</th>
                                <th>Role Name</th>
                                <th>Assigned Permissions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->permissions->count() }}</td>
                                    <td>
                                        @can('edit roles')
                                            <a class="btn btn-outline-info btn-sm" href="{{ route('roles.edit', ['role' => $role]) }}">Edit</a>
                                        @endcan
                                        @can('delete roles')
                                        <form class="float-right" action="{{ route('roles.destroy', ['role' => $role]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this Role?');">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-link btn-sm text-danger">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">There are no Roles to show</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        @can('create roles')
                            <form class="form-inline" action="{{ route('roles.store') }}" method="post">
                                @csrf
                                <label for="name" class="mr-2 ml-1">Add New Role</label>
                                <input class="form-control mr-2" type="text" name="name" placeholder="Role Name">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
