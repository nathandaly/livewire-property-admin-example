@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('developer.dashboard', ['developer' => $developer]) }}">Developer Dashboard</a> &raquo; Regions
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

                    <h2 class="mb-3">Region Management: {{ $developer->display_name }}</h2>

                    <table class="table table-hover table-sm">
                        <thead>
                        <th>Region Name</th>
                        <th>Twindig Area</th>
                        <th class="d-none d-xl-table-cell">Last Updated</th>
                        </thead>
                        <tbody>
                        @forelse($regions as $region)
                        <tr>
                            <td>{{ $region->region_name }}</td>
                            <td>
                                <form
                                    action="{{ route('developer.regions.update', ['developer' => $developer, 'region' => $region]) }}"
                                    class="form-inline"
                                    method="post">
                                    @csrf
                                    @method('PATCH')
                                    <select name="area_id" id="areaName" class="form-control form-control-sm mr-2" onchange="$(this).next('button').prop('disabled', false);">
                                        <option value="">--- Select from list ---</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}"@if($region->area_id == $area->id) selected="selected"@endif>{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary btn-sm rounded-pill px-2" disabled>Save</button>
                                </form>
                            </td>
                            <td class="d-none d-xl-table-cell">{{ $region->updated_at->toDateTimeString() }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">There are no Regions assigned to this account.</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
