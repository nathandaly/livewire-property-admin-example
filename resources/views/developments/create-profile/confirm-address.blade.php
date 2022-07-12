@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo;
            <a href="{{ route('development.profiles.index', ['development' => $development ]) }}">Twindig Profiles</a> &raquo;
            Create New Profile
        </div>
        <div class="row justify-content-center">
            <div class="bg-white rounded-xl shadow-sm col-lg-8">
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

                    <h2 class="mb-3">Create New Twindig Profile - Confirm Address</h2>

                    <p class="lead">Creating from Advert: {{ $advert->location->display_address ?? '-' }}</p>

                    <div class="alert alert-info">
                        To create a new Twindig Profile from this Advert, please confirm the address <strong>exactly</strong> how it will
                        appear in the Postcode Address File. Please Note: This address cannot be changed once the
                        Twindig Profile has been created.
                    </div>

                    <form action="{{ route('development.create-profile', ['development' => $development]) }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4" for="address1">Address Line 1</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="address_1" id="address1", value="{{ $advert->location->address_1 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="address2">Address Line 2</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="address_2" id="address2", value="{{ $advert->location->address_2 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="address3">Address Line 3</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="address_3" id="address3", value="{{ $advert->location->address_3 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="address4">Address Line 4</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="address_4" id="address4", value="{{ $advert->location->address_4 }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="town">Town</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="town" id="town", value="{{ $advert->location->town }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="postcode">Postcode</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="postcode" id="postcode", value="{{ $advert->location->postcode_outcode }} {{ $advert->location->postcode_incode }}">
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" name="advert_id" value="{{ $advert->id }}">
                        <button class="btn btn-primary rounded-pill px-4 mr-2">Create Profile</button>
                        <a href="{{ route('development.create-profile', ['development' => $development ]) }}">Back to Advert selection</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
