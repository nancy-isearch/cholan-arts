<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'program',
        'preferred_time',
        'message',
        'status',
        'product_id',
        'preferred_size',
        'purpose',
        'preferred_finish'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
