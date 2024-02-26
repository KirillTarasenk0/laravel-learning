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
}
