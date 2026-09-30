<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function getCategory()
    {
        return Category::all();
    }

    public function findById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function store(array $categoryData): Category
    {
        return Category::create($categoryData);
    }

    public function update(int $id, array $categoryDataNew): Category
    {
        $category = Category::findOrFail($id);

        $category->update($categoryDataNew);
        
        return $category;
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
