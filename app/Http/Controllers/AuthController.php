<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Customer;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request): JsonResponse
    {
        $user = Customer::find($request->input('customerNumber'));
        if (!$user) {
            return response()->json(['status' => 'user was not found']);
        }
        $token = $user->createToken($user->contactLastName.'auth-token');
        $user->remember_token = $token->plainTextToken;
        $user->save();
        return response()->json([
            'status' => 'user was logged in successfully',
            'authToken' => $token->plainTextToken
        ]);
    }
    public function logout(UserLoginRequest $request): JsonResponse
    {
        auth()->user()->tokens()->delete();
        $user = Customer::find($request->input('customerNumber'));
        $user->remember_token = null;
        $user->save();
        return response()->json(['status' => 'user was unauthorized successfully']);
    }
}
