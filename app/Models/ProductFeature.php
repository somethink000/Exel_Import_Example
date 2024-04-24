<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'brand',
        'compound',
        'count',
        'package_link',          
        'image_link',     
        'seo_title',  
        'seo_h1',           
        'seo_description',         
        'weight',      
        'width',      
        'height',     
        'length',           
        'package_weight',
        'package_width',
        'package_height',
        'package_length',
        'category',
    ];
}
