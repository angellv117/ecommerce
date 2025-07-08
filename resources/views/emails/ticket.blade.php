@component('mail::message')
# Hola {{ $receiver->name }}

Gracias por tu compra. Adjuntamos tu orden de compra #{{ $order->payment_id }} en formato PDF.

@component('mail::button', ['url' => url('/')])
Ir al sitio
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
