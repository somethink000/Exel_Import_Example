<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;



class ProductController extends Controller
{


    public function __construct(
        protected readonly ProductService $ProductService
    ) {
    }

    public function index()
    {
        return ProductResource::collection(Product::paginate(10));
    }

    public function show(Product $Product): ProductResource
    {
        return new ProductResource($Product);
    }

    public function store(ProductStoreRequest $request): ProductResource
    {
        $result = $this->ProductService->create($request);

        return new ProductResource($result);
    }

    public function update(ProductUpdateRequest $request, Product $Product): ProductResource
    {
        $this->ProductService->update($request, $Product);
        return new ProductResource($Product);
    }

    public function destroy(Product $Product): ?bool
    {
        return $this->ProductService->destroy($Product);
    }
}
