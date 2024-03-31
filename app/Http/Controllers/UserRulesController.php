<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserRulesController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        Gate::authorize('create', Order::class);
        return response()->json(['status' => 'you can create order']);
    }
    public function update(Request $request, Order $order): JsonResponse
    {
        Gate::authorize('update', $order);
        return response()->json(['status' => 'you can update order']);
    }
    public function delete(Request $request, Order $order): JsonResponse
    {
        Gate::authorize('delete', $order);
        return response()->json(['status' => 'you can delete order']);
    }
}
