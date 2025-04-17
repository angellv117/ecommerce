<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
        'route' => route('admin.products.index'),
    ],
    [
        'name' => 'Nuevo producto',
    ],
]">
    <div class="p-4">

        <form action="{{ route('admin.products.store') }}" method="POST" class="card-custom">
            @csrf
            <x-label class="text-sm font-bold">Nombre</x-label>
            <x-input name="name" label="Nombre" class="w-full mb-4" placeholder="Ingrese el nombre del producto"
                value="{{ old('name') }}" />
            <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Guardar</x-button>
        </form>
    </div>

</x-admin-layout>
