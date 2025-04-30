<x-app-layout>

    {{-- CARRUSEL --}}
    @include('layouts.partials.app.carrusel')


    {{-- CONTENIDO DESPUÉS DEL CARRUSEL --}}
    <div class=" mt-4 flex flex-col items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach (range(1, 10) as $num)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-2">Categoría {{ $num }}</h2>
                    <p class="text-gray-600">Descripción de la categoría {{ $num }}.</p>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
