<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'The email and password does not match in our database!',
                'success' => false
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('user-token');

        return response()->json([
            'data' => new UserResource($user->load(['userDetail', 'roles'])),
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json([
            'message' => 'The user was succesfully logged out!',
            'success' => true
        ]);
    }
}
