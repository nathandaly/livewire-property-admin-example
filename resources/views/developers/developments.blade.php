@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('developer.dashboard', ['developer' => $developer]) }}">Developer Dashboard</a> &raquo; Developments
        </div>
        <div class="row justify-content-center">
            <div class="bg-white rounded-xl shadow-sm col">
                <div class="py-4 px-2">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <h2 class="mb-3">Developments: {{ $developer->display_name }}</h2>

                        <form class="form-inline mb-4" action="{{ route('developer.developments', ['developer' => $developer]) }}">
                            @csrf
                            <label class="mr-2" for="regionName">Filter by Region:</label>
                            <select name="region_id" id="regionName" class="form-control form-control-sm" onchange="$(this).parent('form').submit();">
                                <option value="">--- All Regions ---</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}"@if($region->id == $region_id) selected="selected"@endif>{{ $region->region_name }}</option>
                                @endforeach
                            </select>
                        </form>

                        <table class="table table-hover table-sm">
                            <thead>
                            <th class="d-none d-lg-table-cell">Region Name</th>
                            <th>Development Name</th>
                            <th>Code</th>
                            <th class="d-none d-xl-table-cell">Last Updated</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @forelse($developments as $development)
                                <tr>
                                    <td class="d-none d-lg-table-cell">{{ $development->region->region_name }}</td>
                                    <td>{{ $development->development_name }}</td>
                                    <td>{{ $development->development_code }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $development->updated_at->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('development.dashboard', ['development' => $development]) }}"
                                           class="btn btn-sm btn-outline-primary rounded-pill">View Dashboard</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There are no Developments to show.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $developments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
