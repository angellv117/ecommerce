<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;
use App\Livewire\Forms\Shopping\CreateAddressForm;
use App\Livewire\Forms\Shopping\EditAddressForm;


class ShoppingAddresses extends Component
{
    public $addresses;
    public $newAddress = false;
    public CreateAddressForm $createAddress;
    public EditAddressForm $editAddress;


    //se ejecuta cuando se carga la página, extrae las direcciones del usuario y llena el formulario con la información del usuario
    public function mount()
    {
        $this->addresses =  Address::where('user_id', auth()->user()->id)->get();
        $this->createAddress->receiver_name = auth()->user()->name . ' ' . auth()->user()->last_name;
    }

    public function showNewAddressForm()
    {
        $this->newAddress = ! $this->newAddress;
    }

    public function saveAddress()
    {
        $this->createAddress->saveAddress();
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Dirección guardada!',
            'text' => 'La dirección se ha guardado correctamente.',
        ]);
        $this->addresses = Address::where('user_id', auth()->user()->id)->get();
        $this->newAddress = false;
    }

    public function setDefaultAddress($id)
    {
        $this->addresses->each(function ($address) use ($id) {
            $address->update(['is_default' => $address->id == $id]);
        });


        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Principal!',
            'text' => 'La dirección se ha establecido como principal correctamente.',
        ]);
    }

    public function updateAddress()
    {
        $this->editAddress->updateAddress();
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Dirección actualizada!',
            'text' => 'La dirección se ha actualizado correctamente.',
        ]);
        $this->addresses = Address::where('user_id', auth()->user()->id)->get();
    }

    public function confirmDelete($id)
    {

        $this->dispatch('confirm-delete', id: $id);
    }

    #[\Livewire\Attributes\On('deleteAddress')]
    public function deleteAddress($id)
    {

        $address = Address::find($id);
        if ($address->is_default) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'No se puede eliminar la dirección principal.',
            ]);
            return;
        }
        $address->delete();
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Dirección eliminada!',
            'text' => 'La dirección se ha eliminado correctamente.',
        ]);

        $this->addresses = Address::where('user_id', auth()->user()->id)->get();
    }

    public function edit($id)
    {
        $address = Address::find($id);
        $this->editAddress->edit($address);
    }





    public function render()
    {
        return view('livewire.shopping-addresses');
    }
}
