<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sub_title',
        'description',
        'price',
        'discount',
        'material',
        'tags',
        'delivery',
        'gi_certified',
        'available_sizes',
        'technique',
        'origin',
        'finish',
        'stock',
        'is_featured',
        'status',
        'feature_image',
        'about_title',
        'about_description',
        'about_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    

    // 🔥 Relationships

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function sections()
    {
        return $this->hasMany(ProductSection::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }

    public function faqs()
    {
        return $this->hasMany(ProductFaq::class);
    }
}