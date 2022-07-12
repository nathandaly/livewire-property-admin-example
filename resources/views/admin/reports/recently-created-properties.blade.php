@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Recently Created Properties</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th>Property</th>
                                <th>Address</th>
                                <th>PPDs</th>
                                <th>EPCs</th>
                                <th>Mobile</th>
                                <th>Broadband</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($properties as $property)
                                <tr>
                                    <td><a href="{{ route('reports.property-detail', [$property]) }}">{{ $property->id }}</a></td>
                                    <td>{{ $property->location->display_address }}</td>
                                    <td class="text-center @if ($property->pricesPaid->count() === 0) text-danger @else text-success @endif">
                                        {{ $property->pricesPaid->count() }}
                                    </td>
                                    <td class="text-center @if ($property->energyPerformanceCertificates->count() === 0) text-danger @else text-success @endif">
                                        {{ $property->energyPerformanceCertificates->count() }}
                                    </td>
                                    <td class="text-center @if ($property->mobileNetworkCoverageResults->count() === 0) text-danger @else text-success @endif">
                                        {{ $property->mobileNetworkCoverageResults->count() }}
                                    </td>
                                    <td class="text-center @if ($property->broadbandCoverageResults->count() === 0) text-danger @else text-success @endif">
                                        {{ $property->broadbandCoverageResults->count() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">There are no properties</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $properties->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
