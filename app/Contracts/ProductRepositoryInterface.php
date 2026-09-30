<?php

namespace App\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function findById(int $id): Product;
    
    public function getActiveProducts();

    public function store(array $productData);

    public function destroy(int $id): bool;
}
