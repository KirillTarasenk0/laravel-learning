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
        $request->validated();
        /*$customer = Customer::where('customerNumber', '=', $request->query('customerNumber'))
            ->update([
                'contactFirstName', $request->query('contactFirstName'),
                'contactLastName', $request->query('contactLastName'),
                'phone', $request->query('phone'),
                'postalCode', $request->query('postalCode')
            ]);*/
        $customer = Customer::find($request->query('customerNumber'));
        $customer->contactFirstName = $request->query('contactFirstName');
        $customer->contactLastName = $request->query('contactLastName');
        $customer->phone = $request->query('phone');
        $customer->postalCode = $request->query('postalCode');
        $customer->save();
        return response()->json(['Успех' => 'Обновление информации о пользователе прошло успешно']);
    }
}
