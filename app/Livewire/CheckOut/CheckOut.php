<?php

namespace App\Livewire\CheckOut;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketOrderMail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckOut extends Component
{

    public $address;
    public $payment_method = 2;
    public $statusCode = 0;
    
    public function mount()
    {
        $this->statusCode = 0;
        $this->statusMessage = '';
        $this->address = Address::where('user_id', auth()->user()->id)
        ->where('is_default', 1)
        ->first();    
    }

    public function pay()
    {

        $content = Cart::instance('shopping')->content();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'address' => Address::where('user_id', auth()->user()->id)->where('is_default', 1)->first()->toArray(),
            'content' => $content,
            'payment_method' => $this->payment_method,
            'payment_id' => uniqid() . '-' . now()->timestamp,
            'total' => str_replace(',', '', Cart::instance('shopping')->subtotal())
        ]);



        $this->statusCode = 1;


        $this->generateTicket($order->payment_id);
        
        Cart::instance('shopping')->destroy();
        DB::table('shoppingcart')->where('identifier', Auth::user()->id)->delete();
        
        

        $this->dispatch('swal-check-out', [
            'icon' => 'success',
            'title' => 'Pedido realizado correctamente',
            'text' => 'El pedido se ha realizado correctamente, revise su correo para el ticket, puede estár en la carpeta de spam',
        ]);

        $this->statusCode = 2;

        
    }

    public function generateTicket($payment_id)
    {
        $order = Order::where('payment_id', $payment_id)->first();
        $receiver = User::find($order->address['user_id']);
    
        $pdf = PDF::loadView('orders.ticket', compact('order', 'receiver'))->setPaper('letter', 'landscape');
        $pdf->save(storage_path('app/private/tickets/ticket-' . $order->id . '.pdf'));
        $order->pdf_path = 'tickets/ticket-' . $order->id . '.pdf';
        $order->save();



        $this->sendTicket($order, $receiver);
    }

    public function sendTicket($order, $receiver)
    {
        Mail::to($receiver->email)->send(new TicketOrderMail($order, $receiver, storage_path('app/private/tickets/ticket-' . $order->id . '.pdf')));


    }

    public function render()
    {
        return view('livewire.check-out.check-out');
    }
}
