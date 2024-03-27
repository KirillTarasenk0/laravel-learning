<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Employee;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        echo 'Все покупатели вместе с привязанными к ним работниками: <br>';
        $people = Employee::with('customer')->get();
        echo '<pre>';
        foreach ($people as $person) {
            echo $person . '<br>';
        }
        echo '</pre>';
        echo 'Список оплат, где дата оплаты больше чем 2004 год: <br>';
        $payments = Payment::where('payments.paymentDate', '>', '2004-12-31')->get();
        foreach ($payments as $payment) {
            echo $payment . '<br>';
        }
    }
}
