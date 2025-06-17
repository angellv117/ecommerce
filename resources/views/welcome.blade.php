<x-app-layout>

    {{-- CARRUSEL --}}
    @include('layouts.partials.app.carrusel') 

    
    {{-- CONTENIDO DESPUÉS DEL CARRUSEL --}}
    <div class=" mt-4 flex flex-col items-center justify-center">
        <!-- Product Carousel -->
        @include('layouts.partials.app.product-carousel')


        {{-- description about us --}}
        @include('layouts.partials.app.description')
    </div>


</x-app-layout>
