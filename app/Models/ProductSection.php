<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $fillable = [
        'product_id',
        'type',
        'title',
        'description',
        'image'
    ];

    const TYPE_SYMBOLISM = 'symbolism';
    const TYPE_CUSTOMISATION = 'customisation';
    const TYPE_CARE = 'care';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}