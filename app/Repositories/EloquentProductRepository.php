<?php

namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Override;

class EloquentProductRepository implements ProductRepositoryInterface
{
    /**
     * Create a new class instance.
     */

    #[Override]
    public function findById($id): Product
    {
       return Product::findOrFail($id);
    }

    #[Override]
    public function getActiveProducts()
    {
        return Product::with('category')->where('status',true)->latest()->get();
    }


    #[Override]
    public function store(array $productData): Product
    {
        return Product::create($productData);
    }

    public function update(int $id, array $productDataNew): Product
    {
        $product = Product::findOrFail($id);

        $product->update($productDataNew);

        return $product;
    }

    #[Override]
    public function destroy(int $id): bool
    {
        $product = Product::findOrFail($id);

        return $product->delete();
    }
}
