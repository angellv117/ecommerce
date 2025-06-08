<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
    ],
]">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex items-center justify-between">
                <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                <div class="ml-4 flex-1">
                    <span class="text-md font-bold">Bienvenido {{ Auth::user()->name }}</span>


                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-md font-bold">
                            <span class="text-red-800 hover:text-red-500">Cerrar sesión</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <div class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center justify-center">
            <span class="text-sm md:text-3xl font-bold text-green-500">24</span>
            <h1 class="text-smfont-bold">productos activos</h1>
        </div>
    </div>
</x-admin-layout>
