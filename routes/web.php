<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// shop
Route::get('shop', [ProductController::class, 'index'])->name('shop');
Route::get('shop/{category}', [ProductController::class, 'category'])->name('shop.category');

// cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::middleware('auth')->group(function () {
    Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('apply-coupon', [CouponController::class, 'applyCoupon'])->name('apply.coupon');
});




require __DIR__ . '/auth.php';
