<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Customer;
use App\Models\Employee;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $info = Employee::with('customer')->get();
        //$info = Employee::find(1702)->customer;
        echo '<pre>';
        foreach ($info as $item) {
            echo $item . '<br>';
        }
        echo '</pre>';
        /*$customers = Customer::with('employees')->get();
        echo '<pre>';
        print_r($customers);
        echo '</pre>';*/
    }
}
