<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;
use App\Http\Resources\CheckoutResource;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('paymentType')->latest()->get();
        return CheckoutResource::collection($checkouts);
    }

    public function store(StoreCheckoutRequest $request)
    {
        Checkout::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Checkout was successfully created!'
        ], 201);
    }

    public function show(Checkout $checkout)
    {
        return response()->json([
            'data' => new CheckoutResource($checkout->load('paymentType'))
        ]);
    }

    public function update(UpdateCheckoutRequest $request, Checkout $checkout)
    {
        $checkout->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Checkout was successfully updated!'
        ]);
    }

    public function destroy(Checkout $checkout)
    {
        if ($checkout->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Checkout was successfully deleted!'
            ]);
        }
    }
}
