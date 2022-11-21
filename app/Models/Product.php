<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'summery',
        'details',
        'price',
        'discounted_price',
        'images',
        'category_id',
        'brand_id',
        'status',
        'featured',
    ];

    protected $casts=[
        'images'=> 'array'
    ];

    public function getThumbnailAttribute()
    {
        return $this->images[0];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
