<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'route' => route('admin.users.index'),
    ],
    [
        'name' => 'Usuario #' . $user->id,
    ],
]">



@livewire('admin.users.edit-user', ['user' => $user, 'roles' => $roles, 'orders' => $orders])



</x-admin-layout>
