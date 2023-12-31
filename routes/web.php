<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\OrderDetails;
use App\Http\Controllers\ProductAddonController;
use App\Http\Controllers\TagController;
use App\Models\Order;
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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', function () {
        return view('dashboard');
    });
Route::resource('/order',OrderController::class);
Route::resource('/orderDetails',OrderDetailsController::class);
Route::resource('/payment',PaymentController::class);
Route::resource('/products',ProductController::class);
Route::resource('/tags',TagController::class);
});




require __DIR__.'/auth.php';

Route::resource('client',ClientController::class);
Route::resource('category',CategoryController::class);
Route::resource('coupon',CouponController::class);


Route::post('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])
    ->name('orders.update-status');

Route::get('/order/addproduct/{order}',[OrderController::class,'create'])
    ->name('product-add');

Route::delete('remove-product/{order}/{product}',[OrderController::class,'removeProduct'])->name('remove-product');



