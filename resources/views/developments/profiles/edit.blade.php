@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo; <a href="{{ route('development.profiles.index', ['development' => $development]) }}">Twindig Profiles</a> &raquo; Edit Twindig Profile
        </div>
        <div class="row justify-content-center">
            <div class="bg-white rounded-xl shadow-sm col-lg-10 col-xl-8">
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

                    <form action="{{ route('development.profiles.update', ['development' => $development, 'profile' => $profile]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <h3>Property Details</h3>
                        <div class="form-group row">
                            <label class="col-md-4" for="profileStatus">Profile Status</label>
                            <div class="col-md-8">
                                <select class="form-control" name="profile_status" id="profileStatus">
                                    <option value="">-- Not Set --</option>
                                    <option value="settled"@if($profile->profile_status == 'settled') selected @endif>Settled</option>
                                    <option value="tempt_me"@if($profile->profile_status == 'tempt_me') selected @endif>Thinking of Selling: Tempt Me</option>
                                    <option value="selling"@if($profile->profile_status == 'selling') selected @endif>Actively Looking to Sell</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="propertyType">Property Type</label>
                            <div class="col-md-8">
                                <select class="form-control" name="property_type" id="propertyType">
                                    <option value="">-- Not Set --</option>
                                    <option value="apartment"@if($profile->property_type == 'apartment') selected @endif>Apartment</option>
                                    <option value="detached-house"@if($profile->property_type == 'detached-house') selected @endif>Detached House</option>
                                    <option value="semi-detached-house"@if($profile->property_type == 'semi-detached-house') selected @endif>Semi-detached House</option>
                                    <option value="link-detached-house"@if($profile->property_type == 'link-detached-house') selected @endif>Link-detached House</option>
                                    <option value="terraced-house"@if($profile->property_type == 'terraced-house') selected @endif>Terraced House</option>
                                    <option value="end-terraced-house"@if($profile->property_type == 'end-terraced-house') selected @endif>End-terraced House</option>
                                    <option value="town-house"@if($profile->property_type == 'town-house') selected @endif>Town House</option>
                                    <option value="maisonette"@if($profile->property_type == 'maisonette') selected @endif>Maisonette</option>
                                    <option value="mews"@if($profile->property_type == 'mews') selected @endif>Mews</option>
                                    <option value="bungalow"@if($profile->property_type == 'bungalow') selected @endif>Bungalow</option>
                                    <option value="cluster-house"@if($profile->property_type == 'cluster-house') selected @endif>Cluster House</option>
                                    <option value="house"@if($profile->property_type == 'house') selected @endif>House</option>
                                    <option value="flat"@if($profile->property_type == 'flat') selected @endif>Flat</option>
                                    <option value="retirement-property"@if($profile->property_type == 'retirement-property') selected @endif>Retirement Property</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="bedrooms">Bedrooms:</label>
                                <input class="form-control" type="text" name="bedrooms" id="bedrooms", value="{{ $profile->bedrooms }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bathrooms">Bathrooms:</label>
                                <input class="form-control" type="text" name="bathrooms" id="bathrooms", value="{{ $profile->bathrooms }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="receptionRooms">Reception Rooms:</label>
                                <input class="form-control" type="text" name="reception_rooms" id="receptionRooms", value="{{ $profile->reception_rooms }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-4" for="parking">Parking</label>
                            <div class="col-md-8">
                                <select class="form-control" name="parking" id="parking">
                                    <option value=""@if($profile->listing_status == '') selected @endif>None or not known</option>
                                    <option value="Single Garage"@if($profile->parking == 'Single Garage') selected @endif>Single Garage</option>
                                    <option value="Double Garage"@if($profile->parking == 'Double Garage') selected @endif>Double Garage</option>
                                    <option value="Allocated Parking"@if($profile->parking == 'Allocated Parking') selected @endif>Allocated Parking</option>
                                    <option value="Triple Garage"@if($profile->parking == 'Triple Garage') selected @endif>Triple Garage</option>
                                    <option value="Underground Parking"@if($profile->parking == 'Underground Parking') selected @endif>Underground Parking</option>
                                    <option value="Driveway"@if($profile->parking == 'Driveway') selected @endif>Driveway</option>
                                    <option value="Undercroft Parking"@if($profile->parking == 'Undercroft Parking') selected @endif>Undercroft Parking</option>
                                    <option value="Car Port"@if($profile->parking == 'Car Port') selected @endif>Car Port</option>
                                    <option value="Off Street Parking"@if($profile->parking == 'Off Street Parking') selected @endif>Off Street Parking</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="yearBuilt">Year Built</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="year_built" id="yearBuilt", value="{{ $profile->year_built }}" @if($profile->year_built) disabled @endif>
                                <small class="form-text text-muted">Note: Once set, this value can not be changed.</small>
                            </div>
                        </div>
                        <hr>
                        <h3>Descriptions</h3>
                        <div class="form-group">
                            <label for="summary">Summary</label>
                            <textarea class="form-control" name="summary" id="summary" cols="30" rows="5">{{ $profile->summary }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $profile->description }}</textarea>
                        </div>
                        <hr>
                        <h3>Feature Points</h3>
                        @foreach(range(1,10) as $featurePoint)
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Feature Point {{ $loop->index + 1 }}</label>
                                <div class="col-sm-8">
                                    <input name="feature_points[]" class="form-control" type="text" value="{{ $profile->feature_points[$loop->index] ?? null }}">
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <h3>Address</h3>
                        <div class="alert alert-info" role="alert">
                            Note: The address cannot be changed, but you can change how it is displayed below.
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="address1">Address Line 1</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="address1", value="{{ $profile->property->location->address_1 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="address2">Address Line 2</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="address2", value="{{ $profile->property->location->address_2 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="address3">Address Line 3</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="address3", value="{{ $profile->property->location->address_3 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="address4">Address Line 4</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="address4", value="{{ $profile->property->location->address_4 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="town">Town</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="town", value="{{ $profile->property->location->town }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="postcode">Postcode</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="postcode", value="{{ $profile->property->location->postcode_outcode }} {{ $profile->property->location->postcode_incode }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="displayAddress">Display Address</label>
                            <input class="form-control" type="text" name="display_address" id="displayAddress", value="{{ $profile->property->location->display_address }}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="latitude">Latitude</label>
                                <input class="form-control" type="text" name="latitude" id="latitude", value="{{ $profile->property->location->latitude }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="longitude">Longitude</label>
                                <input class="form-control" type="text" name="longitude" id="longitude", value="{{ $profile->property->location->longitude }}">
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary rounded-pill px-4">Save Changes</button>
                        <a href="{{ route('development.profiles.index', ['development' => $development]) }}" class="btn btn-link">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
