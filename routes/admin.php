<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\AdminWelcomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [AdminWelcomeController::class, 'index'])->name('dashboard');
    Route::resource('families', FamilyController::class);
    Route::resource('categories', CategoryController::class); 
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('presentations', PresentationController::class);
    Route::resource('products', ProductController::class);


    Route::resource('covers', CoverController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
});