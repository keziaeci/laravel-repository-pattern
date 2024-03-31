<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return (new UserResource($user))->additional([
                'token' => 'Bearer ' . $user->createToken('myToken')->plainTextToken
            ]);
        }

        return response()->json([
            'message' => 'Your credential does not match.',
        ], 401); 
    }

    function logout(Request $request) {
        try {
            $request->user()->tokens()->delete();
    
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'User Logged Out Successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
