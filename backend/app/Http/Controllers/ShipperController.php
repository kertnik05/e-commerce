<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipper;
use App\Http\Resources\ShipperResource;
use App\Http\Requests\StoreShipperRequest;
use App\Http\Requests\UpdateShipperRequest;

class ShipperController extends Controller
{
    //
    public function index(){
        return ShipperResource::collection(Shipper::all());
    }

    public function store(StoreShipperRequest $request, Shipper $shipper){

        $shipper->create($request->only('name', 'contact_number', 'address'));

        return response()->json(['success' => true, 'message' => 'Shipper was succesfully created!']);
    }

    public function update(UpdateShipperRequest $request, Shipper $shipper){

        $shipper->update($request->only('name', 'contact_number', 'address'));

        return response()->json(['success' => true, 'message' => 'Shipper was succesfully updated!']);
    }

    public function destroy(Shipper $shipper){
        $shipper->delete();
        return response()->json(['success' => true, 'message' => 'Shipper was succesfully deleted!']);
    }
}
