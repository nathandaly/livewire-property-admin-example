@extends('layouts.app')

@section('header-scripts')
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Page</div>

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

                            <form action="{{ route('pages.update', [$page->page_id]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="pageTitle">Page Title</label>
                                    <input type="text" name="page_title" id="pageTitle" value="{{ old('page_title', $page->page_title) }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pageSlug">URL Slug</label>
                                    <input type="text" name="slug" id="pageSlug" value="{{ old('slug', $page->slug) }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pageContent">Page Content</label>
                                    <textarea id="pageContent" class="form-control" name="page_content" rows="20">{{ old('page_content', $page->page_content) }}</textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="show_on_sitemap" value="1" id="sitemap" {{ $page->show_on_sitemap ? 'checked="checked"' : '' }}>
                                    <label class="form-check-label" for="sitemap">
                                        Include in Sitemap.xml file <br><small>(check this if you want this page indexed by search engines)</small>
                                    </label>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="metaPageTitle">SEO Page Title</label>
                                    <input type="text" name="meta_page_title" id="metaPageTitle" value="{{ old('meta_page_title', $page->meta_page_title) }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="metaPageDescription">SEO Page Description</label>
                                    <textarea name="meta_page_description" id="metaPageDescription" cols="30" rows="3" class="form-control">{{ old('meta_page_description', $page->meta_page_description) }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Save Page</button>
                                <a class="btn btn-link" href="{{ route('pages.index') }}">Cancel</a>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
