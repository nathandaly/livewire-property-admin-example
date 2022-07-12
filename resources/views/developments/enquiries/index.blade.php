@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo;
            Property Enquiries
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

                    <h2 class="mb-3">Property Enquiries: {{ $development->development_name }}</h2>

                    <table class="table table-hover table-sm">
                        <thead>
                        <th>Plot/Address</th>
                        <th>Enquiry Type</th>
                        <th>Contact Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @forelse($enquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->advert->location->display_address ?? '-'}}</td>
                                <td>{{ $enquiry->message_data->enquiry_type ?? '-' }}</td>
                                <td>{{ $enquiry->message_data->name ?? '-' }}</td>
                                <td>{{ $enquiry->created_at->toDateTimeString() }}</td>
                                <td>
                                    @can('edit adverts')<a href="{{ route('development.enquiries.show', ['development' => $development, 'enquiry' => $enquiry]) }}"
                                                           class="btn btn-sm btn-outline-primary rounded-pill px-3">View</a>@endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">There are no Enquiries for this Development.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
