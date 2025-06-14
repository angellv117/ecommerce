<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{
    use WithPagination;

    public $family_id;

    public $category_id;

    public $subcategory_id;

    public $orderBy = 1;

    public $search;

    #[On('search')]
    public function search($search){
        $this->search = $search;
    }

    public function render()
    {
        $products = Product::verifyFamily($this->family_id)

        ->verifyCategory($this->category_id)

        ->verifySubcategory($this->subcategory_id)

        ->customOrder($this->orderBy)

        
        ->when($this->search, function($query){
            $query->where('name', 'like', '%'.$this->search.'%');
        })


        ->paginate(12);

        return view('livewire.filter', compact('products'));
    }
}
