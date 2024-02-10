<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\PostController;

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'index']);
/*Route::get('/', function () {
    return view('welcome');
});*/
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
Route::get('/time', function () {
    return response()->json(['time' => Carbon::now('Europe/Minsk')->toDateTimeString()]);
});
Route::get('/old-home', function () {
    return redirect('/new-home');
});
Route::match(['get', 'post'], '/contact' , [PostController::class, 'index']);
Route::get('/calculate/{operation}/{number1}/{number2}', function (string $operation, float $number1, float $number2) {
     switch ($operation) {
         case '+':
             return $number1 + $number2;
         case '-':
             return $number1 - $number2;
         case '*':
             return $number1 * $number2;
         case ':':
             return $number1 / $number2;
         default:
             return 'Вы допустили ошибку при вводе параметров или операции. Пожалуйста, повторите ввод.';
     }
});
