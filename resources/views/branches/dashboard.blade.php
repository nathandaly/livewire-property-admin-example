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
                            <h2>{{ $branch->branch_name }}</h2>
                            <p class="lead">{{ $branch->location->display_address ?? '-' }}</p>
                            <dl class="row">
                                <dt class="col-4 col-xl-3 text-right">Branch Reference:</dt>
                                <dd class="col-8 col-xl-9">{{ $branch->branch_ref }}</dd>
                                <dt class="col-4 col-xl-3 text-right">Telephone Number:</dt>
                                <dd class="col-8 col-xl-9"><a href="tel:{{ $branch->telephone ?? '' }}">{{ $branch->telephone ?? '' }}</a></dd>
                                <dt class="col-4 col-xl-3 text-right">Website:</dt>
                                <dd class="col-8 col-xl-9"><a href="{{ $branch->website ?? '' }}">{{ $branch->website ?? '' }}</a></dd>
                                <dt class="col-4 col-xl-3 text-right">Email Address:</dt>
                                <dd class="col-8 col-xl-9"><a href="mailto:{{ $branch->email ?? '' }}">{{ $branch->email ?? '' }}</a></dd>
                            </dl>
                        </div>
                        <div class="d-none d-lg-block col-lg-4">
                            @if($branch->location && $branch->location->latitude && $branch->location->longitude)
                                <iframe
                                    width="100%"
                                    height="300"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key={{ config('services.google_maps.key') }}&q={{ $branch->location->latitude }},{{ $branch->location->longitude }}" allowfullscreen>
                                </iframe>
                            @endif
                        </div>

                    </div>


                    <p class="lead">What would you like to do today?</p>

                    <div class="row">
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Update Account Information</h4>
                                <p>Manage your development information, opening times, website link and telephone numbers</p>
                                <a class="btn btn-outline-primary rounded-pill px-4" href="{{-- route('development.account', ['development' => $branch]) --}}">Branch Information &raquo;</a>
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
