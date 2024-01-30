<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
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

Route::get('/products', [ProductController::class,'show']);
Route::get('/checkout', [ProductController::class,'checkout']);
Route::post('/order', [ProductController::class,'order']);
Route::post('/epayment', [PaymentController::class,'khaltiPayment']);
Route::get('/epayment/verify', [PaymentController::class,'verifyPayment']);
