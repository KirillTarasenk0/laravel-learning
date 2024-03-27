<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\UserInfo;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function store(UserInfoRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $user = UserInfo::create([
            'userName' => $request->input('userName'),
            'userSurname' => $request->input('userSurname'),
            'userAge' => $request->input('userAge'),
            'userEmail' => $request->input('userEmail'),
        ]);
        return response()->json(['status' => 'ok']);
    }
}
