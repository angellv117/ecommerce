<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Presentaciones',
        'route' => route('admin.presentations.index'),
    ],
    [
        'name' => 'Nueva presentación',
    ],
]">
    <div class="p-4">

        <form action="{{ route('admin.presentations.store') }}" method="POST" class="card-custom">
            @csrf
            <x-label class="text-sm font-bold">Nombre</x-label>
            <x-input name="name" label="Nombre" class="w-full mb-4" placeholder="Ingrese el nombre de la presentación"
                value="{{ old('name') }}" />
            <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Guardar</x-button>
        </form>
    </div>

</x-admin-layout>
