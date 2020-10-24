<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return BrandResource::collection($brands);
    }

    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Brand successfully created!'
        ], 201);
    }

    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Brand successfully updated!'
        ]);
    }

    public function destroy(Brand $brand)
    {
        if ($brand->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Brand successfully deleted!'
            ]);
        }
    }
}
