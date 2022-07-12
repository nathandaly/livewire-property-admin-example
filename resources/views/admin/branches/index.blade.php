@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Branches Management
                        <a href="{{ route('branches.create') }}" class="btn btn-primary float-right btn-sm">Add New Branch</a>
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
                                <th>Branch ID</th>
                                <th>Agent Name</th>
                                <th>Branch Name</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($branches as $branch)
                                <tr>
                                    <td>{{ $branch->branch_id }}</td>
                                    <td>{{ $branch->agent_name }}</td>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>{{ Carbon\Carbon::parse($branch->created_at)->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('branches.edit', [$branch->branch_id]) }}" class="btn btn-link btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There are no Branches to show</td>
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
