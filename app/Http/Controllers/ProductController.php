<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index(Request $request): JsonResponse
    {
        $query = Product::query();
        if ($request->has('buyPrice')) {
            $query->where('buyPrice', $request->input('buyPrice'));
        }
        if ($request->has('productVendor')) {
            $query->where('productVendor', $request->input('productVendor'));
        }
        if ($request->has('productLine')) {
            $query->where('productLine', $request->input('productLine'));
        }
        $products = $query->get();
        return response()->json(['success' => true, 'data' => $products]);
    }
}
