<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/post/{slug}', function (string $slug) {
    return 'Параметр соответствует регулярному выражению. Параметр: ' . $slug;
})->where('slug', '[a-z0-9-]+');
Route::match(['get', 'post'], '/submit-contact-form', function () {
    if (request()->isMethod('post')) {
        return 'Форма была отправлена с помощью метода post';
    }
    return 'Форма была отправлена с помощью метода get';
});
Route::get('/greet/{name}', function (string $name) {
    return view('greet', ['name' => $name]);
});
Route::get('/api/users', function () {
    return response()->json([['userName' => 'Kirill Tarasenko'], ['userName' => 'Ivan Ivanov'], ['userName' => 'Egor Egorov']]);
});
