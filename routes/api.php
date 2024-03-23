<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckEmployeeOfficeController;

use App\Models\Product;
use App\Http\Resources\ProductCollectionResource;
use App\Http\Controllers\UpdateCustomerProfileController;
use App\Http\Controllers\SendCustomerPaymentsController;
use App\Http\Controllers\UserRegistrationController;

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
Route::get('/products', [ProductController::class, 'index']);
Route::get('/checkEmployeeNumber', [CheckEmployeeOfficeController::class, 'index']);
Route::get('/productList', function () {
    return ProductCollectionResource::collection(Product::select('productName', 'buyPrice', 'productLine')->paginate(10));
});
Route::patch('/updateCustomerProfile', [UpdateCustomerProfileController::class, 'update']);
Route::middleware('adminToken')->group(function () {
    Route::get('/admin/payment', function () {
        return response()->json(['Состояние ответа:' => 'Админ роут']);
    })->name('admin');
    Route::get('/payment', function () {
        return response()->json(['Состояние ответа:' => 'Не админ роут']);
    })->name('user');
});  
Route::get('/paymentsReport/{customerNumber?}/{timeFrom?}/{timeTo?}', [SendCustomerPaymentsController::class, 'index']);
Route::get('/userRegistration', [UserRegistrationController::class, 'index']);
