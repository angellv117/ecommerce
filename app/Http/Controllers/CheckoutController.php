<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Address;

class CheckoutController extends Controller
{

    public function index(){
        if (!auth()->check()) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'Debes iniciar sesión para continuar con la compra.',
                'icon' => 'warning',
            ]);
    
            return redirect()->route('login');
        }

        if (Cart::instance('shopping')->count() == 0 ) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'No hay productos en el carrito.',
            ]);
            return redirect()->route('cart.index');
        }

        if (!Address::where('user_id', auth()->user()->id)->exists()) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'No hay direcciones guardadas.',
            ]);
            return redirect()->route('shopping.index');
        }

        return view('checkout.index');
    }
}
