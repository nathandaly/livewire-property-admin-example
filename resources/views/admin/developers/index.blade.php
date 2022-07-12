@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Developers Management
                        <a href="{{ route('developers.create') }}" class="btn btn-primary float-right btn-sm">Add New Developer</a>
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
                                <th>Developer ID</th>
                                <th>Developer Name</th>
                                <th>Display Name</th>
                                <th>Website</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($developers as $developer)
                                <tr>
                                    <td>{{ $developer->id }}</td>
                                    <td>{{ $developer->name }}</td>
                                    <td>{{ $developer->display_name }}</td>
                                    <td>{{ $developer->website ?? '-' }}</td>
                                    <td>{{ Carbon\Carbon::parse($developer->created_at)->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('developers.edit', [$developer->id]) }}" class="btn btn-link btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">There are no Developers to show</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
