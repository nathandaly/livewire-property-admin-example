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

                    <h2>Agent: {{ $agent->display_name }}</h2>

                    <p class="lead">What would you like to do today?</p>

                    <div class="row">
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Update Account Information</h4>
                                <p>Manage your billing information, business display name, website link and logo</p>
{{--                                <a href="{{ route('agent.account', ['agent' => $agent]) }}" class="btn btn-outline-primary rounded-pill px-4">Account Management &raquo;</a>--}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage Branches <span class="badge badge-pill badge-dark">{{ $agent->branches->count() }}</span></h4>
                                <p>View and manage your active and archived Branches</p>
                                <p><span class="badge badge-light">{{ $agent->branches->count() }} Active</span></p>
{{--                                <a href="{{ route('agent.branches', ['agent' => $agent]) }}" class="btn btn-outline-primary rounded-pill px-4">Branch Management &raquo;</a>--}}
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
