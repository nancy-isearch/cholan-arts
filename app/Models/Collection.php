<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'name',
        'subtitle',
        'is_active',
        'image'
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
