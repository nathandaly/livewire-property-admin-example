<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'page_title',
        'slug',
        'page_content',
        'meta_page_title',
        'meta_page_description',
        'show_on_sitemap',
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
