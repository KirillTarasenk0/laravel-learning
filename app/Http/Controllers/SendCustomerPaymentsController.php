<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Jobs\SendCustomerPaymentsReports;
use App\Models\Customer;
use Illuminate\Routing\Controller as BaseController;

class SendCustomerPaymentsController extends BaseController
{
    public function index(Request $request): JsonResponse
    {
        $customerNumber = $request->input('customerNumber');
        $timeFrom = $request->input('timeFrom');
        $timeTo = $request->input('timeTo');
        SendCustomerPaymentsReports::dispatch($customerNumber, $timeFrom, $timeTo);
        return response()->json(['ok']);
    }
    /*public function index(int $customerNumber = null, string $timeFrom = null, string $timeTo = null): JsonResponse
    {
        if ($customerNumber) {
            $customerPayments = Customer::with('payments')
                ->where('customerNumber', '=', $customerNumber)
                ->get();
        } else if ($timeFrom && $timeTo) {
              $customerPayments = Customer::with('payments')
                  ->whereBetween('payments.paymentDate', [$timeFrom, $timeTo])
                  ->get();
        } else {
            $customerPayments = Customer::with('payments')->get();
        }
        foreach ($customerPayments as $customerPayment) {
            SendCustomerPaymentsReports::dispatch($customerPayment);
        }
        return response()->json(['ok']);
    }*/
}
