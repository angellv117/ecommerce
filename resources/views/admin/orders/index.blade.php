<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Ordenes',
    ],
]">

@php
        $userId = request()->get('userId');
@endphp


@livewire('admin.order.order-table', ['userId' => $userId])
</x-admin-layout>
