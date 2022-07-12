@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Agents Management
                        <a href="{{ route('agents.create') }}" class="btn btn-primary float-right btn-sm">Add New Agent</a>
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
                                <th>Agent ID</th>
                                <th>Agent Name</th>
                                <th>Website</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($agents as $agent)
                                <tr>
                                    <td>{{ $agent->id }}</td>
                                    <td>{{ $agent->company_name }}</td>
                                    <td>@if(!empty($agent->website))<a href="{{ $agent->website }}" rel="noreferrer noopener" target="_blank">{{ $agent->website }}</a>@else - @endif</td>
                                    <td>{{ Carbon\Carbon::parse($agent->created_at)->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('agents.edit', [$agent->id]) }}" class="btn btn-link btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There are no Agents to show</td>
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
