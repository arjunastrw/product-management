<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

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
// route untuk register
Route::post('/register', [UserController::class, 'register']);
// route untuk login
Route::post('login', [AuthController::class, 'login']);
// router untuk logout
Route::post('logout', [AuthController::class, 'logout']);


//get all product
Route::get('/products', [ProductController::class, 'index']);
//create product
Route::post('/products', [ProductController::class, 'store']);
// route untuk delete product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
