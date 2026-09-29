<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    Private ProductService $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function showProduct($id)
    {
        return response()->json($this->service->getProduct($id));
    }

    public function showActiveProduct()
    {
        return response()->json($this->service->getActiveProducts());
    }


    public function createProduct(StoreProductRequest $request) 
    {
        $product = $this->service->createProduct($request->validated());

        return response()->json([
        'message' => 'Thêm thành công!',
        'data'    => $product,
    ], 201);
    }


    public function deleteProduct($id)
    {

        $this->service->deleteProduct($id); 

        return response()->json([
            'message' => 'Xóa thành công!',
        ],200);
    }
}
