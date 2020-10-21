<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use App\Http\Resources\PaymentTypeResource;
use App\Models\PaymentType;

class PaymentTypeController extends Controller
{
    public function index()
    {
        return PaymentTypeResource::collection(PaymentType::all());
    }

    public function store(StorePaymentTypeRequest $request, PaymentType $payment_type)
    {
        $payment_type->create($request->validated());
        return response()->json([
            'success' => true, 
            'message' => 'Payment Type was succesfully created!'
        ]);
    }

    public function update(UpdatePaymentTypeRequest $request, PaymentType $payment_type)
    {
        $payment_type->update($request->validated());
        return response()->json([
            'success' => true, 
            'message' => 'Payment Type was succesfully updated!'
        ]);
    }

    public function destroy(PaymentType $payment_type)
    {
        $payment_type->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Payment Type was succesfully deleted!'
        ]);
    }
}
