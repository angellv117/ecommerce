<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Address;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartSummary extends Component
{

    public $addresses;

    public function mount()
    {
        if (Cart::instance('shopping')->count() == 0) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'No hay productos en el carrito.',
            ]);
            return redirect()->route('home');
        }
    }


    public function checkAddresses()
    {
        $this->addresses = Address::where('user_id', auth()->user()->id)->get();

        if($this->addresses->isEmpty()){
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'Debes agregar al menos una dirección.',
            ]);
            return;
        }

        return redirect()->route('checkout.index');
    }


    public function render()
    {
        return view('livewire.cart-summary');
    }
}
