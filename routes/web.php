<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use Gloudemans\Shoppingcart\Facades\Cart;


Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('families/{family}', [FamilyController::class, 'show'])->name('families.show');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('subcategories/{subcategory}', [SubcategoryController::class, 'show'])->name('subcategories.show');

// ruta para ver un producto
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('cartD', function () {
    Cart::instance('shopping');
    return Cart::destroy();;
})->name('cart');

Route::get('cart', function () {
    Cart::instance('shopping');
    return Cart::content();;
})->name('cart');