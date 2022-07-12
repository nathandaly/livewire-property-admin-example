@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Role
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>Assigned Permissions for {{ $role->name }}</h2>
                        <form action="{{ route('roles.update', ['role' => $role]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                                @foreach ($permissions as $permission)
                                    <div class="col">
                                        <label>{{ $permission->name }}
                                            <input type="checkbox"
                                                   name="permission[{{ $permission->name }}]"
                                                   @if($role->hasPermissionTo($permission->name)) checked @endif>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <button type="submit">Save Permissions</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
