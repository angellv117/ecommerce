<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias de productos',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => 'Nueva familia',
    ],
]">
    <div class="p-4">

        <form action="{{ route('admin.families.store') }}" method="POST" class="card-custom">
            @csrf
            <x-label class="text-sm font-bold">Nombre</x-label>
            <x-input name="name" label="Nombre" class="w-full mb-4" placeholder="Ingrese el nombre de la familia"
                value="{{ old('name') }}" />
            <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Guardar</x-button>
        </form>
    </div>

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Error de validación',
                text: '{{ $errors->first() }}',
                icon: 'error',
            });
        </script>
    @endif

</x-admin-layout>
