<?php

namespace App\services;

use App\Contracts\CategoryRepositoryInterface;

class CategoryService
{
    /**
     * Create a new class instance.
     */

    private CategoryRepositoryInterface $interface;
    public function __construct(CategoryRepositoryInterface $interface)
    {
        $this->interface = $interface;
    }

    public function getCategory()
    {
        return $this->interface->getCategory();
    }

    public function findById(int $id)
    {
        return $this->interface->findById($id);
    }

    public function store(array $categoryData)
    {
        return $this->interface->store($categoryData);
    }

    public function update(int $id, array $categoryData)
    {
        return $this->interface->update($id, $categoryData);
    }

    public function destroy(int $id)
    {
        return $this->interface->destroy($id);
    }
}
