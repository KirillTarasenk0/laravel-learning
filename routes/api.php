<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', function () {
    return response()->json([['userName' => 'Kirill Tarasenko'], ['userName' => 'Ivan Ivanov'], ['userName' => 'Egor Egorov']]);
});
Route::middleware('adminToken')->group(function () {
    Route::get('/admin/payment', function () {
        return response()->json(['Состояние ответа:' => 'Админ роут']);
    })->name('admin');
    Route::get('/payment', function () {
        return response()->json(['Состояние ответа:' => 'Не админ роут']);
    })->name('user');
});
