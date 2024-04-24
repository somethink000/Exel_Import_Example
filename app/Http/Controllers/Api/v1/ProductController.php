<?php

namespace App\Http\Controllers\Api\v1;

use App\Imports\ProductsImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



class ProductController extends Controller
{
    //Magic

    public function __construct(
        protected readonly ProductService $ProductService
    ) {
    }

    //Api

    public function index()
    {
        $products = ProductResource::collection(Product::paginate(10));

        return view('products',compact('products'));
    }

    public function show(Product $Product)
    {
        $product = new ProductResource($Product);

        return view('show_product',compact('product')); 
    }

    public function destroy(Product $Product): ?bool
    {
        return $this->ProductService->destroy($Product);
    }

    //Main
    
    public function upload_import()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('products'));

        //return back()->with('massage', 'User Imported Successfully');
    }

    
    
}
