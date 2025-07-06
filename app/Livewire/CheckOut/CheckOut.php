<?php

namespace App\Livewire\CheckOut;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Address;

class CheckOut extends Component
{

    public $address;

    public function mount()
    {
        $this->address = Address::where('user_id', auth()->user()->id)
        ->where('is_default', 1)
        ->first();    }

    public function render()
    {
        return view('livewire.check-out.check-out');
    }
}
