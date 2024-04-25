<?php

namespace App\Http\Controllers\Api\v1;

use App\Imports\ProductsImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImportRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



class ProductController extends Controller
{

    //Api

    public function index()
    {
        $products = ProductResource::collection(Product::paginate(25));

        return view('products',compact('products'));
    }

    public function show(Product $Product)
    {
        $product = new ProductResource($Product);

        return view('show_product',compact('product')); 
    }

    //Main
    
    public function upload_import()
    {
        return view('import');
    }

    public function import(ProductImportRequest $request)
    {

        Excel::import(new ProductsImport, $request->file('file'));

        //return redirect('/'); 
    }

    
    
}
