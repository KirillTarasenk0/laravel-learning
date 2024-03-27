<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\CustomerOrderStatusEvent;

class CustomerOrderStatusController extends Controller
{
    public function update(int $orderNumber, string $status): JsonResponse
    {
        $order = Order::find($orderNumber);
        $order->status = $status;
        $order->save();
        CustomerOrderStatusEvent::dispatch($order);
        return response()->json(['status' => 'order was updated']);
    }
}
