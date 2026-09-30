<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function show($id)
    {
        $product = $this->service->getProduct($id);
        return new ProductResource($product);
    }

    public function index()
    {
        $product = $this->service->getActiveProducts();
        return ProductResource::collection($product);
    }


    public function store(StoreProductRequest $request) 
    {
        $product = $this->service->store($request->validated());

       return new ProductResource($product);
    }

    public function update(StoreProductRequest $request, int $id) 
    {
        $product = $this->service->update($id, $request->validated());

       return new ProductResource($product);
    }


    public function destroy(int $id)
    {

        $this->service->destroy($id); 

        return response()->json([
            'message' => 'Xóa thành công!',
        ],200);
    }
}
