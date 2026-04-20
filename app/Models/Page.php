<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
