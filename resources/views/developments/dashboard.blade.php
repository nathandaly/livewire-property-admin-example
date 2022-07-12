@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="bg-white rounded-xl shadow-sm">
                <div class="px-4 pt-4">
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

                    <div class="row mb-4">
                        <div class="col-lg-8">
                            <h2>{{ $development->display_name }}</h2>
                            <p class="lead">{{ $development->location->display_address ?? '-' }}</p>
                            <dl class="row">
                                <dt class="col-4 col-xl-3 text-right">Development Code:</dt>
                                <dd class="col-8 col-xl-9">{{ $development->development_code }}</dd>
                                <dt class="col-4 col-xl-3 text-right">Price Range:</dt>
                                <dd class="col-8 col-xl-9">&pound;{{ number_format($development->price_min, 0) }} - &pound;{{ number_format($development->price_max, 0) }}</dd>
                                <dt class="col-4 col-xl-3 text-right">Email Address:</dt>
                                <dd class="col-8 col-xl-9"><a href="mailto:{{ $development->email ?? '' }}">{{ $development->email ?? '' }}</a></dd>
                                <dt class="col-4 col-xl-3 text-right">Telephone Number:</dt>
                                <dd class="col-8 col-xl-9"><a href="tel:{{ $development->telephone ?? '' }}">{{ $development->telephone ?? '' }}</a></dd>
                                <dt class="col-4 col-xl-3 text-right">Opening Hours:</dt>
                                <dd class="col-8 col-xl-9">{{ $development->opening_hours ?? '-' }}</dd>
                            </dl>
                        </div>
                        <div class="d-none d-lg-block col-lg-4">
                            @if($development->location && $development->location->latitude && $development->location->longitude)
                                <iframe
                                    width="100%"
                                    height="300"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key={{ config('services.google_maps.key') }}&q={{ $development->location->latitude }},{{ $development->location->longitude }}" allowfullscreen>
                                </iframe>
                            @endif
                        </div>

                    </div>


                    <p class="lead">What would you like to do today?</p>

                    <div class="row">
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage Property Adverts</h4>
                                <p>View and manage your active Property Adverts</p>
                                <p><span class="badge badge-light">{{ $development->properties->count() }} Active</span></p>
                                <a href="{{ route('development.adverts.index', ['development' => $development]) }}" class="btn btn-outline-primary rounded-pill px-4">Advert Management &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage Enquiries</h4>
                                <p>See all enquiries for properties on your development</p>
                                <p><span class="badge badge-light">{{ $development->enquiries()->count() }} Enquiries</span></p>
                                <a href="{{ route('development.enquiries.index', ['development' => $development]) }}"
                                   class="btn btn-outline-primary rounded-pill px-4">Enquiry Management &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage Twindigs</h4>
                                <p>View and manage your active Twindig Profiles</p>
                                <p><span class="badge badge-light">{{ $development->profiles->count() }} Profiles</span></p>
                                <a href="{{ route('development.profiles.index', ['development' => $development]) }}" class="btn btn-outline-primary rounded-pill px-4">Profile Management &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Update Account Information</h4>
                                <p>Manage your development information, opening times, website link and telephone numbers</p>
                                <a class="btn btn-outline-primary rounded-pill px-4" href="{{ route('development.account', ['development' => $development]) }}">Development Information &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Upload and Manage Documents</h4>
                                <p>Upload documents and manage document packs within the Twindig Vault.</p>
                                <a href="#"
                                   class="btn btn-outline-primary rounded-pill px-4">Twindig Vault &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage User Accounts</h4>
                                <p>Create new and manage existing users who can access your
                                    account on your behalf.</p>
                                <a href="#"
                                   class="btn btn-outline-primary rounded-pill px-4">User Management &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
