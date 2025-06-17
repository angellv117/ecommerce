<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart; // Asegúrate de importar esta clase si usas esta librería

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Solo bindings, no lógica de usuarios o vistas
    }

    public function boot(): void
    {
        // Este bloque se ejecuta cuando ya hay acceso a la sesión y autenticación
        View::composer('layouts.app', function ($view) {
            Cart::instance('shopping');
            $cartItemsCount = auth()->check() ? Cart::content()->count() : 0;
            $view->with('cartItemsCount', $cartItemsCount);
        });
    }
}
