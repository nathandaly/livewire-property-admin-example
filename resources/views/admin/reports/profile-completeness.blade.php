@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile Completeness</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Address</th>
                                <th>PPDs</th>
                                <th>EPCs</th>
                                <th>Mobile</th>
                                <th>Broadband</th>
                                <th>Chatbot</th>
                                <th>Images</th>
                                <th>Files</th>
                                <th>Reminders</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->id }}</td>
                                    <td>{{ $profile->property->location->display_address }}</td>
                                    <td class="text-center @if ($profile->property->pricesPaid->count() === 0) text-danger @else text-success @endif">
                                        {{ $profile->property->pricesPaid->count() }}
                                    </td>
                                    <td class="text-center @if ($profile->property->energyPerformanceCertificates->count() === 0) text-danger @else text-success @endif">
                                        {{ $profile->property->energyPerformanceCertificates->count() }}
                                    </td>
                                    <td class="text-center @if ($profile->property->mobileNetworkCoverageResults->count() === 0) text-danger @else text-success @endif">
                                        {{ $profile->property->mobileNetworkCoverageResults->count() }}
                                    </td>
                                    <td class="text-center @if ($profile->property->broadbandCoverageResults->count() === 0) text-danger @else text-success @endif">
                                        {{ $profile->property->broadbandCoverageResults->count() }}
                                    </td>
                                    <td class="text-center @if (! $profile->chatbot_completed_at) text-danger @else text-success @endif">
                                        {{ $profile->chatbot_completed_at ? 'true' : 'false' }}
                                    </td>
                                    <td class="text-center @if ($profile->media->count() === 0) text-danger @else text-success @endif">
                                        {{ $profile->media->count() }}
                                    </td>
                                    <td class="text-center @if ($profile->files->count() === 0) text-danger @else text-success @endif">
                                        {{ $profile->files->count() }}
                                    </td>
                                    <td class="text-center @if ($profile->reminders->count() === 0) text-danger @else text-success @endif">
                                        {{ $profile->reminders->count() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">There are no profiles claimed</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $profiles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
