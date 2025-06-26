<?php

namespace App\Livewire\Forms\Shopping;

use Livewire\Attributes\Validate;
use App\Models\Address;
use Livewire\Form;

class CreateAddressForm extends Form
{
    //

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
            'name' => 'required|string|max:255|unique:addresses,name',
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

    public function saveAddress()
    {
        $this->validate();

        if (auth()->user()->addresses()->count() == 0) {
            $this->is_default = true;
        }

        $address = Address::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'address' => $this->address,
            'community' => $this->community,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'postal_code' => $this->postal_code,
            'receiver_name' => $this->receiver_name,
            'reference' => $this->reference,
            'is_default' => $this->is_default,
        ]);


        $this->reset();
    }
}
