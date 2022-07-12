@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create New Agent</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('agents.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="companyName">Company Name</label>
                                <input type="text" name="company_name" id="companyName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="6"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Save Agent</button>
                            <a class="btn btn-link" href="{{ route('agents.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
