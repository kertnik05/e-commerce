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
        Product::create($request->all());
        return response()->json(['success' => true], 201);
    }

    public function show(Product $product)
    {
        return response()->json([
            'data' => new ProductResource($product->load(['brand', 'category'])),
            'success' => true
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json(['success' => true]);
    }

    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return response()->json(['success' => true]);
        }
    }
}
