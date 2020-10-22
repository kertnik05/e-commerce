<?php

namespace App\Http\Controllers;

use App\Models\CheckoutDetail;
use App\Http\Resources\CheckoutDetailResource;
use App\Http\Requests\StoreCheckoutDetailRequest;
use App\Http\Requests\UpdateCheckoutDetailRequest;

class CheckoutDetailController extends Controller
{
    public function index()
    {
        $checkoutDetails = CheckoutDetail::with(['checkout', 'order'])->latest()->paginate(10);
        return CheckoutDetailResource::collection($checkoutDetails);
    }

    public function store(StoreCheckoutDetailRequest $request)
    {
        CheckoutDetail::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Checkout detail successfully create!'
        ], 201);
    }

    public function show(CheckoutDetail $checkoutDetail)
    {
        return new CheckoutDetailResource($checkoutDetail->load(['checkout', 'order']));
    }

    public function update(UpdateCheckoutDetailRequest $request, CheckoutDetail $checkoutDetail)
    {
        $checkoutDetail->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Checkout detail successfully updated!'
        ]);
    }

    public function destroy(CheckoutDetail $checkoutDetail)
    {
        if ($checkoutDetail->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Checkout detail successfully deleted!'
            ]);
        }
    }
}
