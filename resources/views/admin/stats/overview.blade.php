@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Reports Overview</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <h2>The Codling Report</h2>

                            <p class="lead">What are the scores on the doors (George Dawes)?</p>

                            <div class="row">
                                @foreach($kpis as $key => $value)
                                <div class="col-lg-6 col-xl-4 mb-4">
                                    <div class="rounded-xl border h-100 p-4 shadow-sm">
                                        <h4>{{ Str::title(str_replace('_', ' ', $key)) }}</h4>
                                        <p class="text-center display-3">{{ $value }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <hr>

                            <h3>Data Matching Report</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    @foreach(array_keys($propertyStats) as $key)
                                        <th>{{ Str::title(str_replace('_', ' ', $key)) }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach(array_values($propertyStats) as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
