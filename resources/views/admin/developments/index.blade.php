@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Developments List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table table-sm table-hover">
                                <thead>
                                <tr>
                                    <th>Development Code</th>
                                    <th>Development Name</th>
                                    <th>Developer</th>
                                    <th>Region</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($developments as $development)
                                    <tr>
                                        <td>{{ $development->development_code }}</td>
                                        <td>{{ $development->development_name }}</td>
                                        <td>{{ $development->developer_name }}</td>
                                        <td>{{ $development->region_name }}</td>
                                        <td>{{ Carbon\Carbon::parse($development->created_at)->toDateTimeString() }}</td>
                                        <td>
                                            <a href="{{ route('developments.edit', [$development->development_id]) }}" class="btn btn-link btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">There are no Developments to show</td>
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
