<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingController extends Controller
{
    //
    public function index()
    {
        if (!auth()->check()) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'Debes iniciar sesión para continuar con la compra.',
                'icon' => 'warning',
            ]);
    
            return redirect()->route('login');
        }
    
        if (Cart::instance('shopping')->count() === 0) {
            session()->flash('swal', [
                'title' => 'Carrito vacío',
                'text' => 'Agrega productos al carrito antes de continuar con la compra.',
                'icon' => 'info',
            ]);
    
            return redirect()->route('cart.index');
        }
    
        return view('shopping.index'); 
    }
    
}
