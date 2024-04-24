<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_code',
        'name',
        'description',
        'price',
        'discount',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            //var_dump(Str::uuid());
            //dd($model->external_code = Str::uuid());
            //$model->external_code = Str::uuid();
        });

    }

    public function feature(){
        
        return $this->hasOne(ProductFeature::class,'product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}


           