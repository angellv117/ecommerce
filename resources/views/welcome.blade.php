<x-app-layout>

    {{-- CARRUSEL --}}
    @include('layouts.partials.app.carrusel')


    {{-- CONTENIDO DESPUÉS DEL CARRUSEL --}}
    <div class=" mt-4 flex flex-col items-center justify-center">

        @include('layouts.partials.app.product-carousel')
    </div>


</x-app-layout>
