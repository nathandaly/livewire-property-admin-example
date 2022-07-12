@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="px-2 mb-3">
            <a href="{{ route('development.dashboard', ['development' => $development]) }}">Development Dashboard</a> &raquo;
            <a href="{{ route('development.enquiries.index', ['development' => $development]) }}">Property Enquiries</a> &raquo;
            View Enquiry
        </div>
        <div class="row justify-content-center">
            <div class="bg-white rounded-xl shadow-sm col-lg-8 col-xl-6">
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

                    <h2 class="mb-3">View Enquiry</h2>

                    <dl class="row">
                        <dt class="col-4 col-xl-4 text-right">Advert:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->advert->location->display_address ?? '-' }}</dd>
                        <dt class="col-4 col-xl-4 text-right">Enquiry Type:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->message_data->enquiry_type ?? '-' }}</dd>
                        <dt class="col-4 col-xl-4 text-right">Enquiry Time:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->created_at->toDateTimeString() }}</dd>
                        <dt class="col-4 col-xl-4 text-right">Contact Name:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->message_data->name ?? '-' }}</dd>
                        <dt class="col-4 col-xl-4 text-right">Postcode:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->message_data->postcode ?? '-' }}</dd>
                        <dt class="col-4 col-xl-4 text-right">Contact Email:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->message_data->email ?? '-' }}</dd>
                        <dt class="col-4 col-xl-4 text-right">Contact Number:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->message_data->telephone ?? '-' }}</dd>
                        <dt class="col-4 col-xl-4 text-right">Comments:</dt>
                        <dd class="col-8 col-xl-8">{{ $enquiry->message_data->comments ?? '-' }}</dd>
                    </dl>

                </div>
            </div>
        </div>
    </div>
@endsection
