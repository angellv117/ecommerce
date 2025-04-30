<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias de productos',
    ],
]">
    <x-slot name="actionButton">
        <button class="custom-button custom-button-green" type="button"
            onclick="window.location.href = '{{ route('admin.families.create') }}'">
            <p class="text-white hidden  md:block">Agregar familia</p>
            <i class="fa-solid fa-plus block md:hidden"></i>
        </button>
    </x-slot>

    @if ($families->isEmpty())
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50    "
            role="alert">
            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!</span> Aun no hay familias de productos.
            </div>
        </div>
    @else
        <div class="rounded-lg p-4">
            <div class="rounded-lg p-4">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500  ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50    ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($families as $family)
                                <tr class="bg-white border-b     border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  ">
                                        {{ $family->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $family->name }}
                                    </td>
                                    <td class="px-6 py-4 flex items-center justify-center space-x-2">
                                        <button type="button"
                                            x-on:click="window.location.href = '{{ route('admin.families.edit', $family->id) }}'"
                                            class="text-white bg-blue-500 rounded-lg p-2 flex items-center space-x-9">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-end">
                    {{ $families->links() }}
                </div>

            </div>
    @endif
</x-admin-layout>
