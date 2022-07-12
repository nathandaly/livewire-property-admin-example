@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Article</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('articles.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="pageTitle">Blog Title</label>
                                <input type="text" name="blog_title" id="pageTitle" class="form-control" value="{{ old('blog_title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="pageSlug">URL Slug</label>
                                <input type="text" name="slug" id="pageSlug" class="form-control" value="{{ old('slug') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="blogSummary">Blog Summary</label>
                                <textarea id="blogSummary" class="form-control" name="blog_summary" rows="5">{{ old('blog_summary') }}</textarea>
                                <small>This Excerpt is shown on the Market Views homepage</small>
                            </div>
                            <div class="form-group">
                                <label for="pageContent">Blog Content</label>
                                <textarea id="pageContent" class="form-control" name="blog_content" rows="20">{{ old('blog_content') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="publishDate">Publish Date</label>
                                <input type="datetime-local" name="published_at" id="publishDate" class="form-control" value="{{ old('published_at') }}">
                                <small>Posts will show on Market Views homepage after this date.</small>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="metaPageTitle">SEO Page Title</label>
                                <input type="text" name="blog_page_title" id="metaPageTitle" class="form-control" value="{{ old('blog_page_title') }}">
                            </div>
                            <div class="form-group">
                                <label for="metaPageDescription">SEO Page Description</label>
                                <textarea name="blog_page_description" id="metaPageDescription" cols="30" rows="3" class="form-control">{{ old('blog_page_description') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Save Article</button>
                            <a class="btn btn-link" href="{{ route('pages.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
