@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('users.update', [$user->id]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="userName">Full Name</label>
                                    <input type="text" name="name" id="userName" class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="userEmail">Email Address</label>
                                    <input type="text" name="email" id="userEmail" class="form-control" value="{{ $user->email }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Save User</button>
                                <a class="btn btn-link" href="{{ route('users.index') }}">Cancel</a>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
