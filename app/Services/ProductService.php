<?php

namespace App\Services;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Str;


class ProductService
{


    public function create(ProductStoreRequest $request): Product
    {
        $data = $request->only(
            'name',
            'company',
            'phone',
            'email',
            'birthday',
        );

        $path = $request->file('image')->store('Product_images');
        $data['image'] = $path;

        return Product::create($data);
    }



    public function update(ProductUpdateRequest $request, Product $Product): Product
    {

        $data = $request->only(
            'name',
            'company',
            'phone',
            'email',
            'birthday',
        );

        if($request->image){
            $path = $request->file('image')->store('Product_images');
            if ($Product->image != $path) {
                $data['image'] = $path;
                Storage::disk('public')->delete($Product->image);
            }
        }
        
        $Product->update($data);

        return $Product;
    }

    public function destroy(Product $Product): ?bool
    {
        return DB::transaction(function () use ($Product): ?bool {
            $result = $Product->delete();
            Storage::disk('public')->delete($Product->image);
            return $result;
        });
    }
}
