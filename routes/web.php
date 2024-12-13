<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartControllerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'showProducts']);
Route::get('/newproduct', [ProductController::class, 'create']);
Route::post('/newproduct', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'showProducts'])->name('show.product');
Route::get('/carts', [ProductController::class, 'showCheckout'])->name('show.cart');
Route::get('/product/{id}', [ProductController::class, 'ProductDetails'])->name('details.product');
Route::post('/addcart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');

Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/empty', [CartController::class, 'empty'])->name('cart.empty');

Route::get('/checkout', [ProductController::class, 'showCheckout'])->name('checkout.view');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin route

Route::get('/admin', [AdminController::class, 'Home']);
Route::post('/admin', [AdminController::class, 'Login'])->name('admin.login');

Route::get('/admin/home', [AdminController::class, 'Dashboard'])->name('admin.dashboard');




require __DIR__.'/auth.php';
