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

                    <h2 class="mb-3">Create New Twindig Profile</h2>

                    <p class="lead">Development: {{ $development->development_name }}</p>

                    <p>To create a new Twindig profile, start by selecting an active Advert to use as the starting point.</p>

                    <table class="table table-hover table-sm">
                        <thead>
                        <th>Plot/Address</th>
                        <th>Display Address</th>
                        <th>Bedrooms</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @forelse($adverts as $advert)
                            <tr>
                                <td>{{ $advert->location->address_1 }}</td>
                                <td>{{ $advert->location->display_address }}</td>
                                <td>{{ $advert->bedrooms ?? '-' }}</td>
                                <td>
                                    @can('edit adverts')<a href="{{ route('development.create-profile', ['development' => $development, 'advert_id' => $advert->id]) }}"
                                                           class="btn btn-sm btn-outline-primary rounded-pill px-3">Use this Advert &raquo;</a>@endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">There are no Adverts assigned to this Development.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
