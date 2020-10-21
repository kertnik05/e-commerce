<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoleUserRequest;
use App\Http\Requests\RemoveRoleUserRequest;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['userDetail', 'roles'])->latest()->paginate(10);
        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request, User $user)
    {
        $message = 'Guest User successfully created!';
        if ($request->has(['email', 'password']) && $request->filled(['email', 'password'])) {
            $user = $user->create($request->only(['email', 'password']));
            $user->roles()->sync(2);
            $message = 'User successfully created!';
        }
        $user->userDetail()->create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'shipping_address' => $request->shipping_address
        ]);
        return response()->json([
            'success' => true,
            'message' => $message
        ], 201);
    }

    public function show(User $user)
    {
        return new UserResource($user->load(['userDetail', 'roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'email' => $request->email,
            'password' => $request->password
        ]);
        $user->userDetail()->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'shipping_address' => $request->shipping_address
        ]);
        return response()->json([
            'success' => true,
            'message' => 'User successfully updated!'
        ]);
    }

    public function destroy(User $user)
    {
        $user->userDetail()->delete();
        $user->delete();
        $user->roles()->sync([]);
        return response()->json([
            'success' => true,
            'message' => 'User successfully deleted!'
        ]);
    }

    public function addRoleUser(AddRoleUserRequest $request, User $user) 
    {
        $user = $user->roles()->attach($request->role_id);
        return response()->json([
            'success' => true,
            'message' => 'Role was successfully added to the user!'
        ]);
    }

    public function removeRoleUser(RemoveRoleUserRequest $request ,User $user)
    {
        $user = $user->roles()->detach($request->role_id);
        return response()->json([
            'success' => true,
            'message' => 'Role was successfully removed to the user!'
        ]);
    }
}
