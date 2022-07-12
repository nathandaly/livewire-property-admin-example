<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\CreateArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Eloquent\BlogArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ArticleManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'List Articles';
        $articles = BlogArticle::all();

        return view('admin.articles.index', compact('articles', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Article';

        return view('admin.articles.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        $article = new BlogArticle;
        $article->fill($request->except(['published_at']));
        $article->published_at = Carbon::createFromFormat('Y-m-d\TH:i', $request->get('published_at'), 'Europe/London');
        $article->save();

        if (isset($article->id)) {
            return redirect(route('articles.index'))->with('status', 'Article was created successfully!');
        }

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Show Article';
        $article = BlogArticle::findOrFail($id);

        return view('admin.articles.show', compact('article', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Article';
        $article = BlogArticle::findOrFail($id);

        return view('admin.articles.edit', compact('article', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateArticleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $article = BlogArticle::findOrFail($id);
        $article->fill($request->except(['published_at']));
        $article->published_at = Carbon::createFromFormat('Y-m-d\TH:i', $request->get('published_at'), 'Europe/London');
        $article->save();

        if (isset($article->id)) {
            return redirect(route('articles.index'))->with('status', 'Page was updated successfully!');
        }

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = BlogArticle::findOrFail($id);
        $article->delete();

        return redirect(route('articles.index'))->with('status', 'Article was deleted!');
    }
}
