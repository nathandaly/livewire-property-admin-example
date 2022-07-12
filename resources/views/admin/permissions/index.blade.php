@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Permissions Management
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
                                <th>Permission ID</th>
                                <th>Permission Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        @can('delete permissions')
                                        <form action="{{ route('permissions.destroy', ['permission' => $permission]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this Permission?');">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">There are no Permissions to show</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        @can('create permissions')
                            <form class="form-inline" action="{{ route('permissions.store') }}" method="post">
                                @csrf
                                <label for="name" class="mr-2 ml-1">Add New Permission</label>
                                <input class="form-control mr-2" type="text" name="name" placeholder="Permission Name">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
