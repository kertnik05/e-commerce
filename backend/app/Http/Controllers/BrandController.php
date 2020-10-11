<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return BrandResource::collection($brands);
    }

    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->all());
        return response()->json(['success' => true], 201);
    }

    public function show(Brand $brand)
    {
        return response()->json([
            'data' => new BrandResource($brand),
            'success' => true
        ]);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());
        return response()->json(['success' => true]);
    }

    public function destroy(Brand $brand)
    {
        if ($brand->delete()) {
            return response()->json(['success' => true]);
        }
    }
}
