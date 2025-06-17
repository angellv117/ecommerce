<?php

namespace App\Livewire;

use App\Models\Family;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Navigation extends Component
{

    public $isOpen = false;
    public $families  = [];
    public $family_id = "";
    public $cartCount;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        $this->families = Family::all();
        $this->family_id = $this->families->first()->id;
    }


    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)->with('subcategories')->get();

    }

    #[Computed()]
    public function familyName()
    {
        return Family::find($this->family_id)->name;
    }

    public function updateCartCount($count)
    {
        $this->cartCount = $count;
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
