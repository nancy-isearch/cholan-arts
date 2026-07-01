<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'is_active',
        'image',
        'hero_text',
        'footer_title',
        'footer_content',
        'faqs',
        'faq_json_schema'
    ];

    protected $casts = [
        'faqs' => 'array',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    // public function getNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value); // clean store
    }
}
