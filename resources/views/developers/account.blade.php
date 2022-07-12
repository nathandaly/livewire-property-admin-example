@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('developer.dashboard', ['developer' => $developer]) }}">Developer Dashboard</a> &raquo; Account
        </div>
        <div class="row justify-content-center">
            <div class="bg-white rounded-xl shadow-sm col-lg-8 col-xl-6">
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

                    <h2 class="mb-3">Account Management</h2>

                    <form action="{{ route('developer.account.update', ['developer' => $developer]) }}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="feedName">Name in Data Feed (can not be changed):</label>
                            <input class="form-control" type="text" value="{{ $developer->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="displayName">Display Name:</label>
                            <input type="text" class="form-control" name="display_name" value="{{ $developer->display_name }}">
                        </div>
                        <div class="form-group">
                            <label for="websiteUrl">Website URL:</label>
                            <input type="url" class="form-control" name="website" value="{{ $developer->website }}">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Save Changes</button>
                        <a class="btn btn-link" href="{{ route('developer.dashboard', ['developer' => $developer]) }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
