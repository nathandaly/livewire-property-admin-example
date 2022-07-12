@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create New Developer Region</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('developer-regions.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="developerName">Developer Name</label>
                                <select name="developer_id" id="developerName" class="form-control">
                                    <option value="0">--- Select from list ---</option>
                                    @foreach($developers as $developer)
                                        <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="areaName">Area Mapping</label>
                                <select name="area_id" id="areaName" class="form-control">
                                    <option value="">--- Select from list ---</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="regionName">Region Name</label>
                                <input type="text" name="region_name" id="regionName" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Save Region</button>
                            <a class="btn btn-link" href="{{ route('developer-regions.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
