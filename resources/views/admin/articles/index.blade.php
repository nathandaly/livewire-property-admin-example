@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Articles Management
                        <a href="{{ route('articles.create') }}" class="btn btn-primary float-right btn-sm">Add New Article</a>
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
                                <th>ID</th>
                                <th>Blog Title</th>
                                <th>URL Slug</th>
                                <th>Published At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->blog_title }}</td>
                                    <td>{{ $article->slug }}</td>
                                    <td>{{ Carbon\Carbon::parse($article->published_at)->toDateTimeString() }}</td>
                                    <td>
                                        <a href="{{ route('articles.edit', [$article->id]) }}" class="btn btn-link btn-sm">Edit</a>
                                        <a href="https://www.twindig.com/market-views/{{ $article->slug }}" target="_blank" class="btn btn-link btn-sm">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">There are no Articles to show</td>
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
