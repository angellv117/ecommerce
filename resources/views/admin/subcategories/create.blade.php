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
        'name' => 'Nueva subscategoría',
    ],
]">
    <div class="p-4">

        <form action="{{ route('admin.subcategories.store') }}" method="POST" class="card-custom">
            @csrf


            <div class="grid sm:grid-cols-1  md:grid-cols-2 gap-4">
                <div>
                    <x-label class="text-sm font-bold">Nombre de la subcategoría</x-label>
                    <x-input name="name" label="Nombre" class="w-full mb-4"
                        placeholder="Ingrese el nombre de la subcategoría" value="{{ old('name') }}" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Categoría</x-label>
                    <select name="category_id" class="select-custom">
                        <option value="">Seleccione la categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>



            </div>

            <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Guardar</x-button>
        </form>
    </div>

</x-admin-layout>
