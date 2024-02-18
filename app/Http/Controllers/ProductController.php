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
        if ($request->query('buyPrice')) {
            $products = Product::where('buyPrice', $request->query('buyPrice'))->get();
        } else if ($request->query('productVendor')) {
            $products = Product::where('productVendor', $request->query('productVendor'))->get();
        } else if ($request->query('productLine')) {
            $products = Product::where('productLine', $request->query('productLine'))->get();
        } else {
            $products = Product::all();
        }
        return response()->json(['success' => true, 'data' => $products]);
    }
}
