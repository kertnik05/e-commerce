<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\StorePermissionRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());
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
        $role->update($request->validated());
        return response()->json(['success' => true]);
    }

    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return response()->json(['success' => true]);
        }
    }

    public function addRolePermission(StorePermissionRoleRequest $request, Role $role)
    {
        $role = $role->permissions()->attach($request->permission_id);
        return response()->json([
            'success' => true, 
            'message' => 'The permission in role was succesfully created!'
        ]);
    }

    public function removeRolePermission(Request $request, Role $role)
    {
        $role = $role->permissions()->detach($request->permission_id);
        return response()->json([
            'success' => true, 
            'message' => 'The permission in role was succesfully deleted!'
        ]);
    }
}
