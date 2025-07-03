<x-container class="px-4">

    <section class="py-10 bg-white md:py-16 antialiased">
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
                    <div class="flex gap-2 mt-4 justify-center">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="thumb"
                                @click="selectedImage = '{{ asset('storage/' . $image->path) }}'"
                                class="w-16 h-16 object-cover border border-gray-300 rounded cursor-pointer hover:ring-2 hover:ring-primary-500 transition">
                        @endforeach
                    </div>
                </div>


                <!-- Detalles -->
                <div class="flex flex-col justify-between mt-8 lg:mt-0">
                    <!-- Nombre y precio -->
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">{{ $product->name }}</h1>

                        <div class="mt-4 flex items-center justify-between flex-wrap gap-4">
                            <p class="text-3xl font-extrabold text-primary-700">
                                $ {{ number_format($product->price, 2) }} MXN</p>


                        </div>
                    </div>

                    <!-- Cantidad -->
                    <div class="mt-6" x-data="{
                        qty: @entangle('qty')
                    }">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cantidad</label>
                        <div class="flex items-center gap-3 w-fit border border-gray-300 rounded-lg px-3 py-1.5">
                            <button type="button" @click="if (qty > 1) qty--"
                                class="text-lg text-gray-600 hover:text-primary-700 w-full hover:bg-gray-100 rounded-l-lg">–</button>
                            <span id="quantity" x-text="qty" min="1"
                                class="w-12 text-center border-none focus:ring-0 text-gray-800 text-sm font-semibold bg-transparent"></span>
                            <button type="button" @click="qty++"
                                class="text-lg text-gray-600 hover:text-primary-700 w-full hover:bg-gray-100 rounded-r-lg">+</button>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="mt-6 flex flex-wrap gap-4">
                        <button type="button" wire:click="addToCart" wire:loading.attr="disabled"
                            class="add-to-cart custom-button-blue-outline flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Agregar al carrito
                        </button>

                    </div>

                    <!-- Especificaciones -->
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mt-6">
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
                    <div class="mt-6">
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
