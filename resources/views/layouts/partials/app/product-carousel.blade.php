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
                <div id="product-carousel" class="flex transition-transform duration-300 ">
                    @foreach($products as $product)

                    @include('layouts.partials.app.card-product', ['product' => $product])
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
  //*  setInterval(() => {
  //*      currentIndex = (currentIndex + 1) % totalSlides;
  //*      updateCarousel();
  //*  }, 50000);
    
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