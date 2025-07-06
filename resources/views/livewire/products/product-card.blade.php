<div class="min-w-[280px] md:min-w-[320px] px-3 py-4 flex-shrink-0" >
    <div
        class="bg-white  rounded-xl shadow-red-500 overflow-hidden hover:shadow-lg transition-shadow duration-300 h-full flex flex-col">
        <!-- Imagen del producto con badge de precio -->
        <div class="relative h-48 md:h-56 overflow-hidden">
            @if (count($product->images) > 0)
                <img src="{{ asset('storage/' . $product->images[0]->path) }}" alt="{{ $product->name }}"
                    class="w-full h-full object-contain transition-transform duration-300 hover:scale-105">
            @else
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                    class="w-full h-full object-contain transition-transform duration-300 hover:scale-105">
            @endif

            <div class="absolute top-3 right-3 bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                $ {{ number_format($product->price, 2) }} MXN
            </div>
        </div>

        <!-- Detalles del producto -->
        <div class="p-5 flex flex-col h-full">
            <div class="flex items-center mb-2">
                <span class="text-xs font-medium text-gray-500">SKU: {{ $product->sku }}</span>
            </div>

            <!-- Altura fija para el título con truncado -->
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2 h-14 overflow-hidden">{{ $product->name }}</h3>

            <!-- Espaciador flexible que empuja el contenido inferior hacia abajo -->
            <div class="flex-grow"></div>

            <!-- Especificaciones técnicas -->
            <div class="grid grid-cols-2 justify-between items-center gap-1 mt-3 text-xs text-gray-500 mb-4">
                <div class="flex flex-row items-center">
                    @if ($product->min_temperature || $product->max_temperature)
                        @if ($product->min_temperature)
                            <i class="fa-solid fa-snowflake h-4 w-4 mx-1 text-blue-500"></i>
                            <span>{{ $product->min_temperature }}° -</span>
                        @endif
                        @if ($product->max_temperature)
                            <i class="fa-solid fa-fire h-4 w-4 mx-1 text-red-500"></i>
                            {{ $product->max_temperature }}°
                        @endif
                    @endif
                </div>
                <div class="flex items-center">
                    @if ($product->time_to_melt)
                        <i class="fa-solid fa-pizza-slice h-4 w-4 mx-1 text-yellow-500"></i>
                        <span>{{ $product->time_to_melt }} min</span>
                    @endif
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="flex space-x-2">
                <a href="{{ route('products.show', $product) }}"
                    class="flex-1 custom-button-blue">
                    Ver detalles
                </a>

                <button type="button" wire:click="addToCartFromProductCard" wire:loading.attr="disabled"
                    class="add-to-cart custom-button-blue-outline flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
