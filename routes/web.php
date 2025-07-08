<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ShoppingController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\User;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('families/{family}', [FamilyController::class, 'show'])->name('families.show');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('subcategories/{subcategory}', [SubcategoryController::class, 'show'])->name('subcategories.show');

// ruta para ver un producto
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('myCart', [CartController::class, 'index'])
    ->middleware('auth')
    ->name('cart.index');

Route::get('shopping', [ShoppingController::class, 'index'])
    ->middleware('auth')
    ->name('shopping.index');

Route::get('checkout', [CheckoutController::class, 'index'])
    ->middleware('auth')
    ->name('checkout.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('prueba', function () {
    $order = Order::latest()->first();
    $receiver = User::find($order->address['user_id']);

    $pdf = PDF::loadView('orders.ticket', compact('order', 'receiver'))->setPaper('letter', 'landscape');
    $pdf->save(storage_path('app/private/tickets/ticket-' . $order->id . '.pdf'));
    $order->pdf_path = 'tickets/ticket-' . $order->id . '.pdf';
    $order->save();
    return "Ticket generado correctamente";
})->name('cart');
