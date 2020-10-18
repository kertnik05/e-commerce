<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category'])->latest()->paginate(10);
        return ProductResource::collection($products);
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Product successfully created!'
        ], 201);
    }

    public function show(Product $product)
    {
        return $product->load(['brand', 'category']);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Product successfully updated!'
        ]);
    }

    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Product successfully deleted!'
            ]);
        }
    }
}
