<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\UserRegistrationRequest;
use App\Jobs\SendWelcomeEmail;

class UserRegistrationController extends BaseController
{
    public function index(UserRegistrationRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $userName = $request->input('userName');
        $userEmail = $request->input('userEmail');
        SendWelcomeEmail::dispatch($userName, $userEmail);
        return response()->json(['status' => 'ok']);
    }
}
