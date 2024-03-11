<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeNumberRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class CheckEmployeeOfficeController extends BaseController
{
    public function index(EmployeeNumberRequest $request): JsonResponse
    {
        return response()->json(['status' => 'ok']);
    }
}
