<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){
        return OrderResource::collection(Order::with(['user_details', 'product'])->get());
    }

    public function store(StoreOrderRequest $request, Order $order){

        $order = $order->create([
            'user_details_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true, 
            'message' => 'Order was succesfully created!'
        ]);

    }

    public function update(UpdateOrderRequest $request, Order $order){

        $order->update($request->validated());

        return response()->json([
            'success' => true, 
            'message' => 'Order was succesfully updated!'
        ]);
    }

    public function destroy(Order $order){
        $order->delete();
        
        return response()->json([
            'success' => true, 
            'message' => 'Order was succesfully deleted!'
        ]);
    }


}
