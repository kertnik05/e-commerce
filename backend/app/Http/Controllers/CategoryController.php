<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return CategoryResource::collection($categories);
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Category successfully created!'
        ], 201);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Category successfully created!'
        ]);
    }

    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Category successfully deleted!'
            ]);
        }
    }
}
