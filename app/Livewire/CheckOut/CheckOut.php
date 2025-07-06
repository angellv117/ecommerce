<?php

namespace App\Livewire\CheckOut;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Address;

class CheckOut extends Component
{

    public function render()
    {
        return view('livewire.check-out.check-out');
    }
}
