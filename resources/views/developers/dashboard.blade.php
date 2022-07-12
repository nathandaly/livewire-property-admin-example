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

                    <h2>Developer: {{ $developer->display_name }}</h2>

                    <p class="lead">What would you like to do today?</p>

                    <div class="row">
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Update Account Information</h4>
                                <p>Manage your billing information, business display name, website link and logo</p>
                                <a href="{{ route('developer.account', ['developer' => $developer]) }}" class="btn btn-outline-primary rounded-pill px-4">Account Management &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage Regions <span class="badge badge-pill badge-dark">{{ $developer->regions->count() }}</span></h4>
                                <p>Map your regions to Twindig regions to ensure your developments
                                are shown in the correct areas of the Twindig website</p>
                                <a href="{{ route('developer.regions.index', ['developer' => $developer]) }}"
                                   class="btn btn-outline-primary rounded-pill px-4">Region Management &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage Developments <span class="badge badge-pill badge-dark">{{ $developer->developments->count() }}</span></h4>
                                <p>View and manage your active and archived Developments</p>
                                <p><span class="badge badge-light">{{ $developer->developments->count() }} Active</span></p>
                                <a href="{{ route('developer.developments', ['developer' => $developer]) }}" class="btn btn-outline-primary rounded-pill px-4">Development Management &raquo;</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Upload and Manage Documents</h4>
                                <p>Upload documents and manage document packs within the Twindig Vault.</p>
                                <a href="#"
                                   class="btn btn-outline-primary rounded-pill px-4">Twindig Vault &raquo;</a>
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
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="rounded-xl border h-100 p-4 shadow-sm">
                                <h4>Manage Data Feeds</h4>
                                <p>Add or update your automated feed import settings</p>
                                <a href="#"
                                   class="btn btn-outline-primary rounded-pill px-4">Feed Management &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
