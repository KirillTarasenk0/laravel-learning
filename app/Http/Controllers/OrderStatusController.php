<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Events\OrderStatusEvent;
use App\Models\Order;

class OrderStatusController extends Controller
{
    public function update(int $orderNumber, string $orderStatus): JsonResponse
    {
        $order = Order::find($orderNumber);
        if ($order) {
            $order->status = $orderStatus;
            $order->save();
        } else {
            return response()->json(['status' => 'order not found'], 404);
        }
        if ($order->status === 'Сompleted') {
            OrderStatusEvent::dispatch($order);
        }
        return response()->json(['status' => 'ok']);
    }
}
