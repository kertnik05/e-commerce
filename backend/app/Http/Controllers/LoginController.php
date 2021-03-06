<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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

        return response()->json(['access_token' => $token->plainTextToken]);
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
