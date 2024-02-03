<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return 'Добро пожаловать в Laravel!';
});
Route::get('/user/{id?}', function (?int $id = null) {
    return $id ? 'Пользователь с ID: ' . $id : 'Пользователь анонимен';
});
