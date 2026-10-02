<?php

namespace App\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function findById(int $id): Product;
    
    public function getActiveProducts();

    public function store(array $productData): Product;

    public function update(int $id, array $productDataNew): Product;

    public function destroy(int $id): bool;

    public function import(int $id, int $quantityData): Product;

    public function export(int $id, int $exportQuantity): Product;
}
