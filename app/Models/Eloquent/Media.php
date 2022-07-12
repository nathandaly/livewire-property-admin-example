<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'media_location',
        'media_type',
        'document_order',
        'caption',
    ];

    public function mediable()
    {
        return $this->morphTo();
    }
}
