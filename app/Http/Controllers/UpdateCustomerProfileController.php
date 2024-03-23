<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\UpdateCustomerProfileRequest;
use App\Models\Customer;

class UpdateCustomerProfileController extends BaseController
{
    public function update(UpdateCustomerProfileRequest $request): JsonResponse
    {
        Customer::where('customerNumber', '=', $request->input('customerNumber'))
            ->update([
                'contactFirstName' => $request->input('contactFirstName'),
                'contactLastName' => $request->input('contactLastName'),
                'phone' => $request->input('phone'),
                'postalCode' => $request->input('postalCode')
            ]);
        return response()->json(['Успех' => 'Обновление информации о пользователе прошло успешно']);
    }
}
