<x-container class="px-4 min-h-screen">

    <section class="py-10 bg-white antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-12 xl:gap-20">
                <!-- Imagen -->
                <div x-data="{ selectedImage: '{{ count($product->images) > 0 ? asset('storage/' . $product->images[0]->path) : asset('storage/' . $product->image_path) }}' }" class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <!-- Imagen principal con efecto zoom -->
                    <div class="overflow-hidden  rounded-lg group">
                        <img :src="selectedImage" alt="{{ $product->name }}"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>

                    <!-- Miniaturas -->
                    <div class="flex gap-2 mt-4 justify-center swiper CarouselMiniatures">
                        <div class="swiper-wrapper">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="thumb"
                                    @click="selectedImage = '{{ asset('storage/' . $image->path) }}'"
                                    class="swiper-slide w-16 h-16 object-cover border border-gray-300 rounded cursor-pointer hover:ring-2 hover:ring-primary-500 transition">
                            @endforeach
                        </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev text-white"></div>
                        <div class="swiper-button-next text-white"></div>
                    </div>
                </div>


            <!-- Detalles del producto -->
            <div class="flex flex-col gap-6 mt-8 lg:mt-0">
                <!-- Nombre y precio -->
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
                    <p class="text-3xl font-extrabold text-primary-700 mt-2">
                        ${{ number_format($product->price, 2) }} MXN
                    </p>
                </div>

                <!-- Cantidad -->
                <div x-data="{ qty: @entangle('qty') }">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                    <div class="flex items-center gap-3 border border-gray-300 rounded-lg px-3 py-1.5 w-fit">
                        <button type="button" @click="if (qty > 1) qty--"
                            class="text-lg text-gray-600 hover:text-primary-700 hover:bg-gray-100 px-2 rounded-l-lg">–</button>
                        <span id="quantity" x-text="qty"
                            class="w-10 text-center text-gray-800 text-sm font-semibold"></span>
                        <button type="button" @click="qty++"
                            class="text-lg text-gray-600 hover:text-primary-700 hover:bg-gray-100 px-2 rounded-r-lg">+</button>
                    </div>
                </div>

                <!-- Botón de acción -->
                <div>
                    <button type="button" wire:click="addToCart" wire:loading.attr="disabled"
                        class="add-to-cart custom-button-blue-outline flex items-center gap-2 px-5 py-2 rounded-md border border-primary-600 text-primary-700 hover:bg-primary-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0
                                      0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Agregar al carrito
                    </button>
                </div>

                <!-- Especificaciones -->
                <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        @if ($product->min_temperature || $product->max_temperature)
                            @if ($product->min_temperature)
                                <i class="fa-solid fa-snowflake text-blue-500"></i>
                                <span>{{ $product->min_temperature }}° -</span>
                            @endif
                            @if ($product->max_temperature)
                                <i class="fa-solid fa-fire text-red-500"></i>
                                <span>{{ $product->max_temperature }}°</span>
                            @endif
                        @endif
                    </div>

                    <div class="flex items-center gap-2">
                        @if ($product->time_to_melt)
                            <i class="fa-solid fa-pizza-slice text-yellow-500"></i>
                            <span>{{ $product->time_to_melt }} min</span>
                        @endif
                    </div>
                </div>

                <!-- Descripción -->
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-1">Descripción</h2>
                    <p class="text-gray-600 leading-relaxed text-sm">{{ $product->description }}</p>
                </div>
            </div>
        </div>
        </div>

        <!-- Script simple para contador -->
        <script>
            function increaseQty() {
                const qty = document.getElementById("quantity");
                qty.value = parseInt(qty.value) + 1;
            }

            function decreaseQty() {
                const qty = document.getElementById("quantity");
                if (parseInt(qty.value) > 1) qty.value = parseInt(qty.value) - 1;
            }
        </script>
    </section>







</x-container>
@push('scripts')
    <script>
        const swiper = new Swiper('.CarouselMiniatures', {
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
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 10
                }
            }
        });
    </script>
@endpush
