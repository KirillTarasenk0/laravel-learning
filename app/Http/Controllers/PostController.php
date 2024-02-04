<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->has('name') && $request->has('email')) {
            if (strlen($request->input('name')) > 5 && preg_match("/^[a-z]+[0-9]+@[a-z]+\.([a-z]{2,6})/", $request->input('email'))) {
                echo 'Введённое имя: ' . $request->input('name') . '<br>';
                echo 'Введённый email: ' . $request->input('email') . '<br>';
            } else {
                return view('404');
            }
        }
        return view('form');
    }
}
