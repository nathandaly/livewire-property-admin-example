@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo; Twindig Profiles
        </div>
        <div class="row justify-content-center">
            <div class="bg-white rounded-xl shadow-sm col">
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

                    <h2 class="mb-3">Twindig Profiles Management: {{ $development->development_name }}</h2>

                    <p class="text-md-right"><a class="btn btn-primary rounded-pill" href="{{ route('development.create-profile', ['development' => $development]) }}">Create New Profile</a></p>

                    <table class="table table-hover table-sm">
                        <thead>
                        <th>Display Address</th>
                        <th>Bedrooms / Bathrooms / Receptions</th>
                        <th class="d-none d-xl-table-cell">Last Updated</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @forelse($profiles as $profile)
                            <tr>
                                <td>{{ $profile->property->location->display_address ?? '-' }}</td>
                                <td>{{ $profile->bedrooms ?? '-' }} / {{ $profile->bathrooms ?? '-' }} / {{ $profile->reception_rooms ?? '-' }}</td>
                                <td class="d-none d-xl-table-cell">{{ $profile->updated_at->toDateTimeString() }}</td>
                                <td>
                                    @can('edit profiles')<a href="{{ route('development.profiles.edit', ['development' => $development, 'profile' => $profile]) }}"
                                                           class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</a>@endcan
                                    @can('edit profiles')<a href="{{ route('development.profile-inventory', ['development' => $development, 'profile' => $profile]) }}"
                                                            class="btn btn-sm btn-outline-dark-indigo rounded-pill px-3">Inventory</a>@endcan
                                    <a href="#" class="btn btn-sm btn-outline-dark-indigo rounded-pill px-3">Transfer</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">There are no Profiles assigned to this Development.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
