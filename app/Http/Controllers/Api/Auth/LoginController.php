<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful.',
                'data' => [
                    'user' => new UserResource($user),
                    'token' => $user->createToken('myAppToken')->plainTextToken,
                ],
            ]);
        }

        return response()->json([
            'status' => 'failure',
            'message' => 'Your credential does not match.',
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'You have been successfully logged out.',
        ]);
    }

    public function login_get(Request $request)
    {
        return response()->json([
            'status' => 'not-authorized',
            'message' => 'You are not authorized.',
        ], 401);
    }
}
