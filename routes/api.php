<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('/products',ProductController::class);

    Route::get('clients/{clientId}', [ClientController::class, 'getClientDetails']);

Route::put('clients/{clientId}', [ClientController::class, 'updateClientDetails']);
Route::post('clients/{clientId}/addresses', [ClientController::class, 'createAddress']);


});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/forgotpassword', [NewPasswordController::class, 'forgotPassword']);





