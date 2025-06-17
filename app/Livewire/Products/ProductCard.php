<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\Attributes\On;
use Gloudemans\Shoppingcart\Facades\Cart;
class ProductCard extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    //disparar el evento para agregar el producto al carrito que esta en el componente AddToCard
    public function addToCartFromProductCard()
    {
        //verificar si esta iniciado sesion
        if (!auth()->check()) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'Debes iniciar sesión para agregar productos al carrito.',
            ]);
            return;
        }

        try {

            Cart::instance('shopping');
            Cart::add([
                'id' => $this->product->sku,
                'name' => $this->product->name,
                'qty' => 1,
                'price' => $this->product->price,
                'options' => [
                    'image' => $this->product->image_path,
                ],
            ]);

            

            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => '¡Éxito!',
                'text' => 'Producto agregado al carrito correctamente.',
            ]);

            //emitir el evento para actualizar el carrito
            $this->dispatch('cartUpdated', Cart::content()->count());
        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'Hubo un problema al agregar el producto al carrito.' . $th->getMessage(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.products.product-card');
    }
}
