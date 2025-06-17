<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;

class AddToCard extends Component
{
    public $product;
    public $qty = 1;

    //listener para agregar el producto al carrito desde el componente ProductCard
    protected $listeners = ['addToCartFromProductCard' => 'addToCartFromProductCard'];


    // Agregar al carrito 
    public function addToCart()
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
                'qty' => $this->qty,
                'price' => $this->product->price,
                'options' => [
                    'image' => $this->product->image,
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

    public function addToCartFromProductCard($product)
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
                'id' => $product->sku,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => [
                    'image' => $product->image,
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
        return view('livewire.products.add-to-card');
    }



}
