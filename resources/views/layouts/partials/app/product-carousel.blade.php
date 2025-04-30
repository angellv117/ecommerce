<!-- resources/views/components/product-carousel.blade.php -->

<div class="relative w-full overflow-hidden">
    <div class="py-8 md:py-12 bg-gradient-to-r from-gray-50 to-gray-100">
        <div class="container mx-auto px-4">
            <!-- Título del carrusel -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Productos Destacados</h2>
                
                <div class="flex space-x-2">
                    <button id="prev-btn" class="p-2 rounded-full bg-white shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="next-btn" class="p-2 rounded-full bg-white shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Contenedor del carrusel -->
            <div class="relative">
                <div id="product-carousel" class="flex transition-transform duration-300 ease-in-out overflow-x-hidden">
                    @foreach($products as $product)
                    <div class="min-w-[280px] md:min-w-[320px] px-3 flex-shrink-0">
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 h-full flex flex-col">
                            <!-- Imagen del producto con badge de precio -->
                            <div class="relative h-48 md:h-56 overflow-hidden">
                                @if(count($product->images) > 0)
                                    <img src="{{ asset('storage/'.$product->images[0]->path) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                @else
                                    <img src="{{ asset('storage/'.$product->image_path) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                @endif
                                
                                <div class="absolute top-3 right-3 bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                                    {{ number_format($product->price, 2) }} €
                                </div>
                            </div>
                            
                            <!-- Detalles del producto -->
                            <div class="p-5 flex flex-col flex-grow">
                                <div class="flex items-center mb-2">
                                    <span class="text-xs font-medium text-gray-500">SKU: {{ $product->sku }}</span>
                                </div>
                                
                                <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">{{ $product->name }}</h3>
                                
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">{{ $product->description }}</p>
                                
                                <div class="mt-auto">
                                    <!-- Especificaciones técnicas -->
                                    <div class="grid grid-cols-2 gap-1 mt-3 text-xs text-gray-500 mb-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                            <span>{{ $product->min_temperature }}° - {{ $product->max_temperature }}°</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>{{ $product->time_to_melt }} min</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Botones de acción -->
                                    <div class="flex space-x-2">
                                        <a  class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 px-4 rounded-lg transition-colors duration-300">
                                            Ver detalles
                                        </a>
                                        <button type="button" data-product-id="{{ $product->id }}" class="add-to-cart bg-white hover:bg-gray-100 text-blue-500 border border-blue-500 p-2 rounded-lg transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Indicadores (puntos) -->
            <div class="flex justify-center mt-6 space-x-2">
                @for($i = 0; $i < ceil(count($products) / 4); $i++)
                    <button class="carousel-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-500 transition-colors duration-300 focus:outline-none" data-index="{{ $i }}"></button>
                @endfor
            </div>
        </div>
    </div>
</div>

<!-- Script de funcionalidad del carrusel -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('product-carousel');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const dots = document.querySelectorAll('.carousel-dot');
    
    let currentIndex = 0;
    let itemsPerSlide = window.innerWidth < 768 ? 1 : 4; // Número de items por diapositiva
    const totalSlides = Math.ceil({{ count($products) }} / itemsPerSlide);
    
    // Función para actualizar el carrusel
    const updateCarousel = () => {
        const itemWidth = carousel.querySelector('div').offsetWidth;
        const slideWidth = itemWidth * itemsPerSlide;
        carousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        
        // Actualizar los puntos indicadores
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-blue-500');
            } else {
                dot.classList.remove('bg-blue-500');
                dot.classList.add('bg-gray-300');
            }
        });
    };
    
    // Manejadores de botones
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    });
    
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    });
    
    // Manejadores de clic para los puntos indicadores
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
    });

    // Auto-slide opcional
    setInterval(() => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }, 5000);
    
    // Actualizar el tamaño y los elementos visibles cuando cambia el tamaño de la ventana
    window.addEventListener('resize', () => {
        const newItemsPerSlide = window.innerWidth < 768 ? 1 : 4;
        if (newItemsPerSlide !== itemsPerSlide) {
            itemsPerSlide = newItemsPerSlide;
            updateCarousel();
        }
    });
    
    // Actualizar el primer punto al inicio
    if (dots.length > 0) {
        dots[0].classList.remove('bg-gray-300');
        dots[0].classList.add('bg-blue-500');
    }
});
</script>