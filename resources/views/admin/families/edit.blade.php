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
        'name' => 'Editar familia',
    ],
]">
    <div class="p-4">
        <form action="{{ route('admin.families.update', $family) }}" method="POST" class="card-custom">
            @csrf
            @method('PUT')
            <x-input name="name" label="Nombre" class="w-full mb-4" placeholder="Ingrese el nombre de la familia"
                value="{{ old('name', $family->name) }}" />

            <div class="flex justify-start space-x-2">
                <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Actualizar</x-button>
                <x-danger-button type="submit" onclick="confirmDelete()">Eliminar</x-danger-button>
            </div>
        </form>
    </div>




    <form id="delete-form" action="{{ route('admin.families.update', $family) }}" method="POST">
        @csrf
        @method('PUT')
    </form>


    @push('scripts')
        <script>
            function confirmDelete() {
                alert('Eliminar');
                document.getElementById('delete-form').submit();
            }
        </script>
    @endpush

</x-admin-layout>
