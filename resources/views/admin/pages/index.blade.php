@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pages Management
                        <a href="{{ route('pages.create') }}" class="btn btn-primary float-right btn-sm">Add New Page</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th>Page ID</th>
                                <th>Page Title</th>
                                <th>URL Slug</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($pages as $page)
                                <tr>
                                    <td>{{ $page->page_id }}</td>
                                    <td>{{ $page->page_title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ Carbon\Carbon::parse($page->created_at)->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('pages.edit', [$page->page_id]) }}" class="btn btn-link btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There are no Pages to show</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
