<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['userDetail', 'roles'])->latest()->paginate(10);
        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request)
    {
        if ($request->has(['email', 'password'])) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
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
            $user->roles()->sync(2);
            return response()->json([
                'success' => true
            ], 201);
        }
        else {
            $user = UserDetail::create([
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
                'success' => true
            ], 201);
        }
    }

    public function show(User $user)
    {
        return response()->json(['data' => new UserResource($user->load(['userDetail', 'roles']))]);
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
        return response()->json(['success' => true]);
    }

    public function destroy(User $user)
    {
        $user->userDetail()->delete();
        $user->delete();
        $user->roles()->sync([]);
        return response()->json(['success' => true]);
    }
}
