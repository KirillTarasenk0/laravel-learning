<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends BaseController
{
    private int $orderNumber;
    public function index(int $orderNumber): void
    {
        $this->orderNumber = $orderNumber;
        $info = OrderDetail::join('orders', 'orderdetails.orderNumber', '=', 'orders.orderNumber')
            ->join('products', 'orderdetails.productCode', '=', 'products.productCode')
            ->where('orders.orderNumber', '=', $this->orderNumber)
            ->get();
        echo 'Информация о деталях определённого заказа: <br>';
        foreach ($info as $order) {
            echo $order . '<br>';
        }
    }
}
