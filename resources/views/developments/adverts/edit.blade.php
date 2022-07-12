@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo; <a href="{{ route('development.adverts.index', ['development' => $development]) }}">Adverts</a> &raquo; Edit Advert
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

                    <form action="{{ route('development.adverts.update', ['development' => $development, 'advert' => $advert]) }}">
                        <h3>Property Details</h3>
                        <div class="form-group row">
                            <label class="col-md-4" for="agentReference">Agent Reference:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="agent_reference" id="agentReference", value="{{ $advert->agent_reference }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="listingStatus">Listing Status</label>
                            <div class="col-md-8">
                                <select class="form-control" name="listing_status" id="listingStatus">
                                    <option value="available"@if($advert->listing_status == 'available') selected @endif>Available</option>
                                    <option value="reserved"@if($advert->listing_status == 'reserved') selected @endif>Reserved</option>
                                    <option value="sold"@if($advert->listing_status == 'sold') selected @endif>Sold</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="propertyType">Property Type</label>
                            <div class="col-md-8">
                                <select class="form-control" name="property_type" id="propertyType">
                                    <option value="apartment"@if($advert->property_type == 'apartment') selected @endif>Apartment</option>
                                    <option value="detached-house"@if($advert->property_type == 'detached-house') selected @endif>Detached House</option>
                                    <option value="semi-detached-house"@if($advert->property_type == 'semi-detached-house') selected @endif>Semi-detached House</option>
                                    <option value="link-detached-house"@if($advert->property_type == 'link-detached-house') selected @endif>Link-detached House</option>
                                    <option value="terraced-house"@if($advert->property_type == 'terraced-house') selected @endif>Terraced House</option>
                                    <option value="end-terraced-house"@if($advert->property_type == 'end-terraced-house') selected @endif>End-terraced House</option>
                                    <option value="town-house"@if($advert->property_type == 'town-house') selected @endif>Town House</option>
                                    <option value="maisonette"@if($advert->property_type == 'maisonette') selected @endif>Maisonette</option>
                                    <option value="mews"@if($advert->property_type == 'mews') selected @endif>Mews</option>
                                    <option value="bungalow"@if($advert->property_type == 'bungalow') selected @endif>Bungalow</option>
                                    <option value="cluster-house"@if($advert->property_type == 'cluster-house') selected @endif>Cluster House</option>
                                    <option value="house"@if($advert->property_type == 'house') selected @endif>House</option>
                                    <option value="flat"@if($advert->property_type == 'flat') selected @endif>Flat</option>
                                    <option value="retirement-property"@if($advert->property_type == 'retirement-property') selected @endif>Retirement Property</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="bedrooms">Bedrooms:</label>
                                <input class="form-control" type="text" name="bedrooms" id="bedrooms", value="{{ $advert->bedrooms }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bathrooms">Bathrooms:</label>
                                <input class="form-control" type="text" name="bathrooms" id="bathrooms", value="{{ $advert->bathrooms }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="receptionRooms">Reception Rooms:</label>
                                <input class="form-control" type="text" name="reception_rooms" id="receptionRooms", value="{{ $advert->reception_rooms }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-4" for="parking">Parking</label>
                            <div class="col-md-8">
                                <select class="form-control" name="parking" id="parking">
                                    <option value=""@if($advert->listing_status == '') selected @endif>None or not known</option>
                                    <option value="Single Garage"@if($advert->parking == 'Single Garage') selected @endif>Single Garage</option>
                                    <option value="Double Garage"@if($advert->parking == 'Double Garage') selected @endif>Double Garage</option>
                                    <option value="Allocated Parking"@if($advert->parking == 'Allocated Parking') selected @endif>Allocated Parking</option>
                                    <option value="Triple Garage"@if($advert->parking == 'Triple Garage') selected @endif>Triple Garage</option>
                                    <option value="Underground Parking"@if($advert->parking == 'Underground Parking') selected @endif>Underground Parking</option>
                                    <option value="Driveway"@if($advert->parking == 'Driveway') selected @endif>Driveway</option>
                                    <option value="Undercroft Parking"@if($advert->parking == 'Undercroft Parking') selected @endif>Undercroft Parking</option>
                                    <option value="Car Port"@if($advert->parking == 'Car Port') selected @endif>Car Port</option>
                                    <option value="Off Street Parking"@if($advert->parking == 'Off Street Parking') selected @endif>Off Street Parking</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="yearBuilt">Year Built</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="year_built" id="yearBuilt", value="{{ $advert->year_built }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="price">Price</label>
                            <div class="col-md-8">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&pound;</div>
                                    </div>
                                    <input class="form-control" type="text" name="price" id="price", value="{{ $advert->price }}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4" for="priceQualifier">Price Qualifier:</label>
                            <div class="col-md-8">
                                <select class="form-control" name="price_qualifier" id="priceQualifier">
                                    <option value="none"@if($advert->price_qualifier == 'none') selected @endif>No qualifier (set price)</option>
                                    <option value="poa"@if($advert->price_qualifier == 'poa') selected @endif>POA</option>
                                    <option value="from"@if($advert->price_qualifier == 'from') selected @endif>Prices From</option>
                                    <option value="shared-equity"@if($advert->price_qualifier == 'shared-equity') selected @endif>Shared Equity</option>
                                    <option value="equity-loan"@if($advert->price_qualifier == 'equity-loan') selected @endif>Equity Loan</option>
                                    <option value="coming-soon"@if($advert->price_qualifier == 'coming-soon') selected @endif>Coming Soon</option>
                                    <option value="shared-ownership"@if($advert->price_qualifier == 'shared-ownership') selected @endif>Shared Ownership</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <h3>Descriptions</h3>
                        <div class="form-group">
                            <label for="summary">Summary</label>
                            <textarea class="form-control" name="summary" id="summary" cols="30" rows="5">{{ $advert->summary }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $advert->description }}</textarea>
                        </div>
                        <hr>
                        <h3>Feature Points</h3>
                        @foreach($advert->feature_points ?? [] as $featurePoint)
                            <div class="form-group row">
                                <label class="control-label col-sm-4">Feature Point {{ $loop->index + 1 }}</label>
                                <div class="col-sm-8">
                                    <input name="feature_points[]" class="form-control" type="text" value="{{ $featurePoint }}">
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group row">
                            <label class="control-label col-sm-4">Add Feature Point</label>
                            <div class="col-sm-8">
                                <input name="feature_points[]" class="form-control" type="text" value="">
                            </div>
                        </div>
                        <hr>
                        <h3>Address</h3>
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
                        <div class="form-group">
                            <label for="displayAddress">Display Address</label>
                            <input class="form-control" type="text" name="display_address" id="displayAddress", value="{{ $advert->location->display_address }}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="latitude">Latitude</label>
                                <input class="form-control" type="text" name="latitude" id="latitude", value="{{ $advert->location->latitude }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="longitude">Longitude</label>
                                <input class="form-control" type="text" name="longitude" id="longitude", value="{{ $advert->location->longitude }}">
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary rounded-pill px-4">Save Changes</button>
                        <a href="{{ route('development.adverts.index', ['development' => $development]) }}" class="btn btn-link">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
