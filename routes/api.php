<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TagController;
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
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/{id}/products',[CategoryController::class,'productsByCategory']);
Route::get('/tags',[TagController::class,'index']);
Route::get('/tags/{id}/products',[TagController::class,'productsByTag']);
Route::post('/coupon',[CouponController::class,'validateCoupon']);