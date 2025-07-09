<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowOrder extends Component
{
    public $order;

    public function mount($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.orders.show-order');
    }

    public function downloadTicket($id)
    {
        try {
            return response()->download(storage_path('app/private/tickets/ticket-' . $id . '.pdf'));
        } catch (\Exception $e) {
            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'El ticket no existe',
            ]);
        }
    }
}
