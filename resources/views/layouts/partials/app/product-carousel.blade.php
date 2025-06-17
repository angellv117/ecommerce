@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

<div class="mx-auto max-w-screen-sm text-center ">
    <h2 class="text-4xl md:text-5xl font-bold">
        <span class=" text-blue-700">Nuestros Productos</span>
    </h2>
    <div class="w-20 h-1 bg-blue-500 rounded-full flex justify-center items-center mx-auto"></div>
    <p class="font-light text-gray-500 lg:mb-16 sm:text-xl ">Explora la colección completa de productos de nuestra
        empresa</p>
</div>
<!-- Slider main container -->
<div class="swiper CarouselProducts w-full">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach ($products as $product)
            <div class="swiper-slide">
                @livewire('products.product-card', ['product' => $product])
            </div>
        @endforeach
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.CarouselProducts', {
            // Optional parameters
            loop: true,


            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            slidesPerView: 1,
            spaceBetween: 10,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 3,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10
                }
            }
        });
    </script>
@endpush
