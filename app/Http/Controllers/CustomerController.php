<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Customer;
use Illuminate\Routing\Controller as BaseController;

class CustomerController extends BaseController
{
    public function destroy(int $customerNumber): JsonResponse
    {
        $customer = Customer::find($customerNumber);
        if ($customer) {
            foreach ($customer->orders as $order) {
                $order->orderDetails()->delete();
            }
            $customer->delete();
            return response()->json(['status' => 'customer was deleted']);
        } else {
            return response()->json(['status' => 'customer not found'], 404);
        }
    }
}
