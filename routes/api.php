<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadLogController;
use App\Http\Controllers\UploadingFilesController;
use App\Http\Controllers\DocumentManagerController;

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
Route::post('/loadLog', [LoadLogController::class, 'store']);
Route::post('/uploadFiles', [UploadingFilesController::class, 'store']);
Route::post('/manageDocuments', [DocumentManagerController::class, 'store']);
