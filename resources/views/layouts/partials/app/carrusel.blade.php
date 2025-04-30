    {{-- Carrusel para Laravel usando Tailwind CSS --}}
    <div class="relative top-0 left-0 w-full h-[70vh] overflow-hidden">
        <!-- Swiper -->
        <div class="swiper mySwiper h-full w-full">
            <div class="swiper-wrapper">
                @foreach ($covers as $cover)
                    <div class="swiper-slide relative">
                        <img src="{{ $cover->image_path }}" alt="{{ $cover->title }}" class="w-full h-full object-cover">
                        <!-- Contenedor centrado en medio -->
                        <div class="absolute inset-0 flex items-center">
                            <div class="hidden md:block ml-16">
                                <h2 class="text-3xl md:text-4xl font-bold text-white text-center ">
                                    {{ $cover->title }}
                                </h2>
                            </div>
                            <div class="flex flex-col items-center justify-center md:hidden">
                                <img src="{{ asset('img/logo-white.png') }}" alt="{{ $cover->title }}"
                                    class="w-1/2">

                                    <a class="flex items-center space-x-3">
                                        <div>
                                            <span class="text-white font-bold text-lg md:text-xl tracking-tight leading-tight">
                                                Industria Lechera
                                            </span>
                                            <div class="flex items-center">
                                                <span class="text-white/90 text-sm">San Juan del Río</span>
                                                <div class="w-10 h-0.5 bg-blue-300 rounded-full ml-2 opacity-70"></div>
                                            </div>
                                        </div>
                                    </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
                class="w-full h-16 md:h-24">
                <path fill="#ffffff"
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>



    {{-- Scripts para el carrusel --}}
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.0/swiper-bundle.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.0/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const swiper = new Swiper(".mySwiper", {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            });
        </script>
    @endpush
