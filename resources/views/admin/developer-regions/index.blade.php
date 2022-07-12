@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Developer Regions Management
                        <a href="{{ route('developer-regions.create') }}" class="btn btn-primary float-right btn-sm">Add New Region</a>
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
                                <th>Region ID</th>
                                <th>Developer Name</th>
                                <th>Region Name</th>
                                <th>Area Name</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($regions as $region)
                                <tr>
                                    <td>{{ $region->region_id }}</td>
                                    <td>{{ $region->developer_name }}</td>
                                    <td>{{ $region->region_name }}</td>
                                    <td>{{ $region->area_name ?? '-' }}</td>
                                    <td>{{ Carbon\Carbon::parse($region->created_at)->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('developer-regions.edit', [$region->region_id]) }}" class="btn btn-link btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There are no Regions to show</td>
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
