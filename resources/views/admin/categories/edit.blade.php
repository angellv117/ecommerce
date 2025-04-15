<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorías de productos',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'Editar categoría',
    ],
]">
    <div class="p-4">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="card-custom">
            @csrf
            @method('PUT')
            <div class="grid sm:grid-cols-1  md:grid-cols-2 gap-4">
                <div>
                    <x-label class="text-sm font-bold">Nombre de la categoría</x-label>
                    <x-input name="name" label="Nombre" class="w-full mb-4"
                        placeholder="Ingrese el nombre de la categoría" value="{{ old('name', $category->name) }}" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Familia</x-label>
                    <select name="family_id" class="select-custom">
                        <option value="">Seleccione la familia</option>
                        @foreach ($families as $family)
                            <option value="{{ $family->id }}" {{ $category->family_id == $family->id ? 'selected' : '' }}>
                                {{ $family->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-start space-x-2">
                <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Actualizar</x-button>
                <x-danger-button type="button" onclick="confirmDelete()">Eliminar</x-danger-button>
            </div>
        </form>
    </div>




    <form id="delete-form" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>


    @push('scripts')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción eliminará la categoría de productos',
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
