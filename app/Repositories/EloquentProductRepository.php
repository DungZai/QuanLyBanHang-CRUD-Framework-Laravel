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
    public function createProduct(array $productData)
    {
        return Product::create($productData);
    }

    #[Override]
    public function deleteProduct(int $id): bool
    {
        $product = Product::findOrFail($id);

        return $product->delete();
    }
}
