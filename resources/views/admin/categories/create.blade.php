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
        'name' => 'Nueva categoría',
    ],
]">
    <div class="p-4">

        <form action="{{ route('admin.categories.store') }}" method="POST" class="card-custom">
            @csrf
            <div class="grid sm:grid-cols-1  md:grid-cols-2 gap-4">
                <div>
                    <x-label class="text-sm font-bold">Nombre de la categoría</x-label>
                    <x-input name="name" label="Nombre" class="w-full mb-4"
                        placeholder="Ingrese el nombre de la categoría" value="{{ old('name') }}" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Familia</x-label>
                    <select name="family_id" class="select-custom">
                        <option value="">Seleccione la familia</option>
                        @foreach ($families as $family)
                            <option value="{{ $family->id }}">{{ $family->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Guardar</x-button>
        </form>
    </div>

</x-admin-layout>
