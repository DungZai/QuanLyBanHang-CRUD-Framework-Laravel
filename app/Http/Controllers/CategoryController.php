<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getCategory();

        return CategoryResource::collection($categories);
    }

    public function show(int $id)
    {
        $category = $this->service->findById($id);
        return new CategoryResource($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->service->store($request->validated());

        return new CategoryResource($category);
    }

    public function update(StoreCategoryRequest $request, int $id)
    {
        $category = $this->service->update($id, $request->validated());

        return new CategoryResource($category);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);

        return response()->json([
            'message' => 'Xóa thành công !',
        ], 200);
    }
}
