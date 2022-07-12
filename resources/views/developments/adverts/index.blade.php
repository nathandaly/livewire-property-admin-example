@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo; Adverts
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

                    <h2 class="mb-3">Advert Management: {{ $development->development_name }}</h2>

                    <table class="table table-hover table-sm">
                        <thead>
                        <th>Plot/Address</th>
                        <th>Display Address</th>
                        <th>Bedrooms</th>
                        <th>Price</th>
                        <th class="d-none d-xl-table-cell">Last Updated</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @forelse($adverts as $advert)
                            <tr>
                                <td>{{ $advert->location->address_1 }}</td>
                                <td>{{ $advert->location->display_address }}</td>
                                <td>{{ $advert->bedrooms ?? '-' }}</td>
                                <td>&pound;{{ $advert->price_formatted ?? '-' }}</td>
                                <td class="d-none d-xl-table-cell">{{ $advert->updated_at->toDateTimeString() }}</td>
                                <td>
                                    @can('edit adverts')<a href="{{ route('development.adverts.edit', ['development' => $development, 'advert' => $advert]) }}"
                                       class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</a>@endcan
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
