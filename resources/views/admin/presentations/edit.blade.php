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
        'name' => 'Editar presentación',
    ],
]">
    <div class="p-4">
        <form action="{{ route('admin.presentations.update', $presentation) }}" method="POST" class="card-custom">
            @csrf
            @method('PUT')
            <x-input name="name" label="Nombre" class="w-full mb-4" placeholder="Ingrese el nombre de la presentación"
                value="{{ old('name', $presentation->name) }}" />

            <div class="flex justify-start space-x-2">
                <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Actualizar</x-button>
                <x-danger-button type="button" onclick="confirmDelete()">Eliminar</x-danger-button>
            </div>
        </form>
    </div>




    <form id="delete-form" action="{{ route('admin.presentations.destroy', $presentation) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>


    @push('scripts')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción eliminará la presentación',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    @endpush

</x-admin-layout>
