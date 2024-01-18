<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'provider',
        'source_category_id',
        'dialer_price',
        'retail_price',
        'quantity',
        'description',
        'brand',
        'weight',
        'images',
        'source_url',
        'part_number',
        'subcategory_id',
        'source_id'
    ];

    protected $casts = [
        'images' => 'json',
    ];
}
