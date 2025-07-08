<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $receiver;
    public $pdf_path;

    public function __construct($order, $receiver, $pdf_path)
    {
        $this->order = $order;
        $this->receiver = $receiver;
        $this->pdf_path = $pdf_path;
    }

    public function build()
    {
        return $this->subject('Tu orden de compra #'.$this->order->payment_id)
            ->markdown('emails.ticket')
            ->attach($this->pdf_path, [
                'as' => 'OrdenCompra-'.$this->order->payment_id.'.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
