<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegistrationController;

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
Route::get('/welcome', function () {
    return 'Добро пожаловать в Laravel!';
});
Route::get('/user/{id?}', function (int $id = null) {
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
Route::get('/time', function () {
    return response()->json(['time' => Carbon::now('Europe/Minsk')->toDateTimeString()]);
});
Route::get('/new-home', function () {
    return 'New home';
});
Route::get('/old-home', function () {
    return redirect('/new-home');
});
Route::match(['get', 'post'], '/contact', [PostController::class, 'index']);
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
Route::get('/order/{orderNumber}', [OrderController::class, 'index'])->where('orderNumber', '[0-9]+');;
Route::get('/registration', [RegistrationController::class, 'create']);
Route::post('/registration', [RegistrationController::class, 'store']);
Route::get('/site', function () {
    return view('withoutTechnicalWorks');
})->middleware(\App\Http\Middleware\MaintenanceMode::class);
Route::middleware('adminToken')->group(function () {
    Route::get('/admin/payment', function () {
        return response()->json(['Состояние ответа:' => 'Админ роут']);
    })->name('admin');
    Route::get('/payment', function () {
        return response()->json(['Состояние ответа:' => 'Не админ роут']);
    })->name('user');
});
