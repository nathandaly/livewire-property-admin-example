@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create New User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="userName">Full Name</label>
                                <input type="text" name="name" id="userName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="userEmail">Email Address</label>
                                <input type="text" name="email" id="userEmail" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="userPassword">Password</label>
                                <input type="password" name="password" id="userPassword" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="userPasswordConfirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="userPasswordConfirm" class="form-control" required>
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
