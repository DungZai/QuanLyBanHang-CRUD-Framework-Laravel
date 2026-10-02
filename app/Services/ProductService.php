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
        : 'out_of_stock';

        return $product;
    }

    public function getActiveProducts()
    {
        $products = $this->repository->getActiveProducts();

        foreach($products as $product) {
            $product->stock_status = $product->quantity > 0
            ? 'in_stock'
            : 'out_of_stock';
        }

        return $products;
    }

    public function store(array $productData)
    {
        $product = $this->repository->store($productData);

        $product->stock_status = $product->quantity > 0
        ? 'in_stock'
        : 'out_of_stock';

        return $product;
    }

    public function update(int $id, array $productDataNew)
    {
        $product = $this->repository->update($id, $productDataNew);

        $product->stock_status = $product->quantity > 0
        ? 'in_stock'
        : 'out_of_stock';

        return $product;
    }

    public function destroy(int $id)
    {
        return $this->repository->destroy($id);
    }

    public function import(int $id, int $quantityData)
    {
        $product = $this->repository->findById($id);

        $newQuantity = $product->quantity + $quantityData;

        $product = $this->repository->import($id, $newQuantity);
        return $product;
    }

    public function export(int $id, int $exportQuantity)
    {
        $product = $this->repository->findById($id);

        if ($product->quantity < $exportQuantity) {
            return;
        }
        
        $remainingQuantity = $product->quantity - $exportQuantity;

        $product = $this->repository->export($id, $remainingQuantity);

        return $product;
    }
}
