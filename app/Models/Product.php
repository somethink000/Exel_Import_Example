<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            
            
            if ( !$model->external_code ) // || $model->where('external_code', $model->external_code)->exists() 
            {
                $model->external_code = Str::uuid();
            }
        });

    }


    public function feature(){
        
        return $this->hasOne(ProductFeature::class,'product_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}


           