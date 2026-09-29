<?php

namespace App\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function findById($id): Product;
    
    public function getActiveProducts();

    public function createProduct(array $productData);

    public function deleteProduct(int $id): bool;
}
