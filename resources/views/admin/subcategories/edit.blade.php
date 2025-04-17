<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategorías de productos',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'Editar subcategoría',
    ],
]">
    <div class="p-4">
        <form action="{{ route('admin.subcategories.update', $subcategory) }}" method="POST" class="card-custom">
            @csrf
            @method('PUT')
            <div class="grid sm:grid-cols-1  md:grid-cols-2 gap-4">
                <div>
                    <x-label class="text-sm font-bold">Nombre de la categoría</x-label>
                    <x-input name="name" label="Nombre" class="w-full mb-4"
                        placeholder="Ingrese el nombre de la subcategoría" value="{{ old('name', $subcategory->name) }}" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Categoria</x-label>
                    <select name="category_id" class="select-custom">
                        <option value="">Seleccione la categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
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




    <form id="delete-form" action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>


    @push('scripts')
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción eliminará la subcategoría de productos',
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
