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

                    <h1>Welcome back {{ $user->name }}!</h1>

                    <p class="lead">Select which account you want to work with below:</p>

                    <div class="row">
                        @forelse($accounts as $account)
                            <div class="col-lg-6 col-xl-4 mb-4">
                                <div class="rounded-xl border h-100 p-4 shadow-sm">
                                    <h3>{{ $account->account->display_name }}</h3>
                                    <p><span class="badge badge-light">{{ $account->account_type }}</span></p>
                                    <a href="{{ route($account->account_type . '.dashboard', [$account->account_type => $account->account_id]) }}"
                                       class="btn btn-outline-primary rounded-pill px-4">Go to Dashboard &raquo;</a>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-8 offset-md-2">
                                <div class="alert alert-info text-center">
                                    You do not have any accounts associated with your account.
                                </div>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
