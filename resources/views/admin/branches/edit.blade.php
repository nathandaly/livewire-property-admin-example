@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit Branch</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('branches.update', [$branch->branch_id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="agentName">Agent Name</label>
                                <select name="agent_id" id="agentName" class="form-control">
                                    <option value="0">--- Select from list ---</option>
                                    @foreach($agents as $agent)
                                        <option value="{{ $agent->id }}"@if($branch->agent_id == $agent->id) selected="selected"@endif>{{ $agent->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="branchRef">Branch Reference</label>
                                <input type="text" name="branch_ref" id="branchRef" class="form-control" value="{{ $branch->branch_ref }}" required>
                            </div>
                            <div class="form-group">
                                <label for="branchName">Branch Name</label>
                                <input type="text" name="branch_name" id="branchName" class="form-control" value="{{ $branch->branch_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Branch Telephone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $branch->telephone }}">
                            </div>
                            <div class="form-group">
                                <label for="website">Branch Website</label>
                                <input type="text" name="website" id="website" class="form-control" value="{{ $branch->website }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Branch Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $branch->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Save Branch</button>
                            <a class="btn btn-link" href="{{ route('branches.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
