<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;

class AddToCard extends Component
{
    public $product;
    public $qty = 1;



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
            //verificar si el producto tiene imagenes
            if($this->product->images->count() > 0){
                $image = $this->product->images[0]->path;
            }else{
                $image = $this->product->image_path;
            }

            Cart::instance('shopping');
            Cart::add([
                'id' => $this->product->sku,
                'name' => $this->product->name,
                'qty' => $this->qty,
                'price' => $this->product->price,
                'options' => [
                    'image' => $image,
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
