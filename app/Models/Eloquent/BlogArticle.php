<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogArticle extends Model
{
    use SoftDeletes;

    protected $perPage = 25;

    protected $fillable = [
        'slug',
        'blog_title',
        'blog_image_url',
        'blog_summary',
        'blog_content',
        'blog_page_title',
        'blog_page_description',
        'published_at',
    ];

    protected $dates = [
        'published_at',
    ];
}
