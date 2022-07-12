@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo; Account
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

                    <form action="{{ route('development.account.update', ['development' => $development]) }}" class="form" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-8 col-form-label" for="feedName">Development Code (can not be changed):</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" value="{{ $development->development_code }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row col-form-label">
                            <label class="col-md-4" for="developmentName">Development Name:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="development_name" id="developmentName" value="{{ $development->development_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="telephone">Telephone Number:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="telephone" id="telephone" value="{{ $development->telephone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="email">Email Address:</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" id="email" value="{{ $development->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="priceMin">Lowest Price</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&pound;</div>
                                    </div>
                                    <input class="form-control" type="text" name="price_min" id="priceMin", value="{{ $development->price_min }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label" for="priceMax">Highest Price</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&pound;</div>
                                    </div>
                                    <input class="form-control" type="text" name="price_max" id="priceMax", value="{{ $development->price_max }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="openingHours">Opening Hours</label>
                            <textarea class="form-control" name="opening_hours" id="openingHours" cols="30" rows="10">{{ $development->opening_hours }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $development->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary rounded-pill px-4">Save Changes</button>
                        <a class="btn btn-link" href="{{ route('development.dashboard', ['development' => $development]) }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
