<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        return response()->json([
            'success' => true
        ], 201);
    }

    public function show(Role $role)
    {
        return response()->json(['data' => new RoleResource($role)]);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return response()->json(['success' => true]);
    }

    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return response()->json(['success' => true]);
        }
    }
}
