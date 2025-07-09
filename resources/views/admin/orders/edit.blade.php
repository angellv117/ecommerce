<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Ordenes',
        'route' => route('admin.orders.index'),
    ],
    [
        'name' => 'Orden #' . $order->payment_id,
    ],
]">



@livewire('admin.order.edit-order', ['order' => $order])



</x-admin-layout>
