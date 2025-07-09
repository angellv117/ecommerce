<?php

namespace App\Livewire\Admin\Order;

use App\Enums\OrderStatus;
use Livewire\Component;

class EditOrder extends Component
{
    public $order;
    public $status = [];

    public $status_selected = 0;

    public function mount($order)
    {
        $this->order = $order;
        $this->status_selected = $order->status;
        $this->status = OrderStatus::cases();
    }


    public function updateStatus()
    {
        $this->order->status = $this->status_selected;
        $this->order->save();

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Estado actualizado!',
            'text' => 'El estado de la orden se ha actualizado correctamente.',
        ]);
        
        return redirect()->route('admin.orders.index');
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

    public function render()
    {
        return view('livewire.admin.order.edit-order');
    }
}
