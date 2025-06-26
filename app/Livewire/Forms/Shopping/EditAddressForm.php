<?php

namespace App\Livewire\Forms\Shopping;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Address;

class EditAddressForm extends Form
{
    //
    public $id;
    public $name = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $country = '';
    public $postal_code = '';
    public $receiver_name = '';
    public $reference = '';
    public $community = '';
    public $is_default = false;


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'community' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => 'Nombre descriptivo de la dirección',
            'address' => 'Dirección',
            'community' => 'Comunidad',
            'city' => 'Ciudad',
            'state' => 'Estado',
            'country' => 'País',
            'postal_code' => 'Código postal',
            'receiver_name' => 'Nombre del receptor',
            'reference' => 'Referencia',
        ];
    }

    //inicializar el formulario con los datos de la dirección
    public function edit($address)
    {

        $this->id = $address->id;
        $this->name = $address->name;
        $this->address = $address->address;
        $this->city = $address->city;
        $this->state = $address->state;
        $this->country = $address->country;
        $this->postal_code = $address->postal_code;
        $this->receiver_name = $address->receiver_name;
        $this->reference = $address->reference;
        $this->community = $address->community;
        $this->is_default = $address->is_default;
    }


    public function updateAddress()
    {
        $this->validate();
        $address = Address::find($this->id);
        $address->update($this->all());
        $this->reset();
    }
}
