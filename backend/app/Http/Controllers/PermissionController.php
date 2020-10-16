<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        return PermissionResource::collection(Permission::all());
    }

    public function store(StorePermissionRequest $request, Permission $permission)
    {
        $permission->create($request->only('name', 'description'));
        return response()->json([
            'success' => true, 
            'message' => 'Permission was succesfully created!'
        ]);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission = $permission->update($request->only('name', 'description'));
        return response()->json([
            'success' => true, 
            'message' => 'Permission was succesfully updated!'
        ]);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Permission was succesfully removed!'
        ]);
    }
}
