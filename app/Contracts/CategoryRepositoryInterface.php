<?php

namespace App\Contracts;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getCategory();

    public function findById(int $id): Category;

    public function store(array $categoryData): Category;

    public function update(int $id, array $categoryDataNew): Category;

    public function destroy(int $id);
}
