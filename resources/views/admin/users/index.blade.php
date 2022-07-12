@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Users Management
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right btn-sm">Add New User</a>
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
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Email Address</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->created_at)->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-link btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There are no Users to show</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
