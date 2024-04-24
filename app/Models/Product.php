<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
    ];

    public function features(){
        return $this->belongsTo(ProductFeature::class,'product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
