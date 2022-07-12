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
                        <div class="col-lg-6">
                            <h2>Property Detail Report</h2>
                            <p class="lead">{{ $property->location->display_address ?? '-' }}</p>

                            <h4>Overview</h4>
                            <dl class="row">
                                <dt class="col-4 col-xl-3 text-right">Property ID:</dt>
                                <dd class="col-8 col-xl-9">{{ $property->id }}</dd>
                                <dt class="col-4 col-xl-3 text-right">PAF UDP:</dt>
                                <dd class="col-8 col-xl-9">{{ $property->paf_udp ?? 'not set'}}</dd>
                                <dt class="col-4 col-xl-3 text-right">UPRN:</dt>
                                <dd class="col-8 col-xl-9">{{ $property->unique_property_reference_number ?? '-' }}</dd>
                                <dt class="col-4 col-xl-3 text-right">Postcode:</dt>
                                <dd class="col-8 col-xl-9">{{ $property->postcode ?? '-'}}</dd>
                                <dt class="col-4 col-xl-3 text-right">Property Type:</dt>
                                <dd class="col-8 col-xl-9">{{ $property->property_type ?? '-' }}</dd>
                                <dt class="col-4 col-xl-3 text-right">Lat/Long:</dt>
                                <dd class="col-8 col-xl-9">{{ $property->latitude ?? '-'}}, {{ $property->longitude ?? '-' }}</dd>
                            </dl>
                            <h4>Matched Records</h4>
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>PPD</th>
                                    <th>EPC</th>
                                    <th>Mobile</th>
                                    <th>Broadband</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $property->pricesPaid->count() }}</td>
                                    <td>{{ $property->energyPerformanceCertificates->count() }}</td>
                                    <td>{{ $property->mobileNetworkCoverageResults->count() }}</td>
                                    <td>{{ $property->broadbandCoverageResults->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none d-lg-block col-lg-6">
                            @if($property->latitude && $property->longitude)
                                <iframe
                                    width="100%"
                                    height="450"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key={{ config('services.google_maps.key') }}&q={{ $property->latitude }},{{ $property->longitude }}&maptype=satellite" allowfullscreen>
                                </iframe>
                            @endif
                        </div>

                    </div>


                        @include('admin.reports._partials.ppd-table')
                        @include('admin.reports._partials.epc-table')
                        @include('admin.reports._partials.ofcom-mobile-table')
                        @include('admin.reports._partials.ofcom-broadband-table')





                </div>
            </div>
        </div>
    </div>
@endsection
