@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-0 mb-2 container">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo;
            <a href="{{ route('development.profiles.index', ['development' => $development]) }}">Twindig Profiles</a> &raquo;
            Edit Twindig Inventory
        </div>
    </div>
    <div class="bg-white mb-4">
        <div class="container py-3">
            <h3 class="mb-0">Profile Inventory: {{ $profile->property->location->display_address }}</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3 px-3">
                <div class="bg-white border rounded-xl shadow-sm p-4">
                    @if($areas->count())
                        <ul class="nav flex-column mb-4" role="tablist" id="profileAreaList">
                            @foreach($areas as $area)
                                <li class="nav-item border-bottom border-light">
                                    <a class="nav-link text-dark px-0 @if($loop->first) active @endif" href="#area{{ $area->id }}" data-toggle="tab">{{ $area->area_name }}</a>
                                </li>
                            @endforeach
                        </ul>

                    @else
                        <div class="alert alert-info">You don't have any areas yet, why not create one using the form below.</div>
                    @endif
                    <form class="form-inline" method="post">
                        @csrf
                        <div class="input-group">
                        <label class="sr-only" for="areaName">Create New Area:</label>
                        <input class="form-control form-control-sm rounded-left" type="text" id="areaName" name="area_name" placeholder="Create new area">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-dark-indigo rounded-right" type="submit" name="action" value="create_area">Create</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-9 px-2">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(!$areas->count())
                    <div class="bg-white border rounded-xl shadow-sm p-4">
                        <h2>Profile Inventory</h2>

                        <p class="lead">Address: {{ $profile->property->location->display_address }}</p>

                        <p>The inventory has been designed to store information about the "areas" of your home
                            and the "items" within them. An area might be a room (e.g. "Master Bedroom" or "Kitchen")
                            or a space (e.g. "Rear Garden" or "Double Garage").</p>

                        <p>Start by creating some areas using the form on the left. You will then be able to store
                            information and add items to each area.</p>
                    </div>
                @endif

                <div class="tab-content">
                @foreach($areas as $area)
                    <div class="tab-pane fade @if($loop->first) show active @endif" id="area{{ $area->id }}" role="tabpanel">
                        <div class="row mb-3">
                            <div class="col-6 pr-2">
                                <div class="bg-white border rounded-xl shadow-sm p-4 h-100">
                                    <h3 class="mb-4">{{ $area->area_name }}</h3>
                                    <h4 class="mb-3">Measurements</h4>
                                    <form method="post">
                                        @csrf
                                        <table class="table table-sm mb-1">
                                            <tr>
                                                <th>Dimensions</th>
                                                <td><input class="form-control form-control-sm" type="text" name="area_dimensions" value="{{ $area->area_dimensions }}"></td>
                                            </tr>
                                            <tr>
                                                <th>Ceiling Height</th>
                                                <td><input class="form-control form-control-sm" type="text" name="ceiling_height" value="{{ $area->ceiling_height }}"></td>
                                            </tr>
                                            <tr>
                                                <th>Door frame</th>
                                                <td><input class="form-control form-control-sm" type="text" name="door_frame" value="{{ $area->door_frame }}"></td>
                                            </tr>
                                            <tr>
                                                <th>Window frame</th>
                                                <td><input class="form-control form-control-sm" type="text" name="window_frame" value="{{ $area->window_frame }}"></td>
                                            </tr>
                                            <tr>
                                                <th>Number of Sockets</th>
                                                <td><input class="form-control form-control-sm" type="text" name="number_of_sockets" value="{{ $area->number_of_sockets }}"></td>
                                            </tr>
                                        </table>
                                        <input type="hidden" name="area_id" value="{{ $area->id }}">
                                        <button class="btn btn-sm btn-outline-dark-indigo rounded-pill" type="submit" name="action" value="update_area">Update Measurements</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-6 pl-2">
                                <div class="bg-white border rounded-xl shadow-sm p-4 h-100">
                                    <h4 class="mb-3">Images</h4>
                                    <img src="https://unsplash.it/400/300?random" class="img-fluid rounded-lg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border rounded-xl shadow-sm p-4 mb-2">
                            <h4 class="mb-3">Finishings</h4>

                            <table class="table table-sm table-hover mb-4">
                                <thead>
                                <th style="width: 17.05%;">Item Name</th>
                                <th style="width: 17.05%;">Type</th>
                                <th style="width: 17.05%;">Make</th>
                                <th style="width: 17.05%;">Style</th>
                                <th style="width: 17.05%;">Colour</th>
                                <th></th>
                                </thead>
                                @forelse($area->items as $item)
                                    <tr>
                                        <td>{{ $item->item_name ?? '-' }}</td>
                                        <td>{{ $item->item_type ?? '' }}</td>
                                        <td>{{ $item->item_make ?? '' }}</td>
                                        <td>{{ $item->item_style ?? '' }}</td>
                                        <td>{{ $item->item_colour ?? '' }}</td>
                                        <td><button class="btn btn-sm rounded-pill btn-outline-info">More Info</button></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">There are no items in this area.</td>
                                    </tr>
                                @endforelse
                            </table>
                            <form class="form-inline" method="post">
                                @csrf
                                <div>
                                    <h5>Add Item:</h5>
                                    <input class="form-control form-control-sm col-2" type="text" name="item_name" placeholder="Item Name">
                                    <input class="form-control form-control-sm col-2" type="text" name="item_type" placeholder="Type">
                                    <input class="form-control form-control-sm col-2" type="text" name="item_make" placeholder="Make">
                                    <input class="form-control form-control-sm col-2" type="text" name="item_style" placeholder="Style">
                                    <input class="form-control form-control-sm col-2" type="text" name="item_colour" placeholder="Colour">
                                    <input type="hidden" name="area_id" value="{{ $area->id }}">
                                    <button class="btn btn-sm btn-outline-dark-indigo rounded-pill" type="submit" name="action" value="create_item">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
