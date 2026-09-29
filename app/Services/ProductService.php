<?php

namespace App\Services;

use App\Contracts\ProductRepositoryInterface;

class ProductService
{
    /**
     * Create a new class instance.
     */

    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getProduct(int $id)
    {
        $product = $this->repository->findById($id);
        $product->stock_status = $product->quantity > 0
        ? 'in_stock'
        : 'out_stock';
        return $product;
       
    }

    public function getActiveProducts()
    {
        $products = $this->repository->getActiveProducts();
        foreach($products as $product) {
            $product->stock_status = $product->quantity > 0
            ? 'in_stock'
            : 'out_stock';
        }
        return $products;
    }

    public function createProduct(array $productData)
    {
        return $this->repository->createProduct($productData);
    }

    public function deleteProduct(int $id)
    {
        return $this->repository->deleteProduct($id);
    }
}
