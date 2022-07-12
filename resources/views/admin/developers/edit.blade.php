@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit Developer</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('developers.update', [$developer->id]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="developerName">Developer Name</label>
                                    <input type="text" name="name" id="developerName" class="form-control disabled" value="{{ $developer->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="displayName">Display Name</label>
                                    <input type="text" name="display_name" id="displayName" class="form-control" value="{{ $developer->display_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" name="website" id="website" class="form-control" value="{{ $developer->website }}">
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Save Developer</button>
                                <a class="btn btn-link" href="{{ route('developers.index') }}">Cancel</a>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
