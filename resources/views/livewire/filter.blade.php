<div class="bg-white py-12">
    <x-container>


        <div class="flex items-center mb-8">
            <span class="mr-2 ml-4 sm:ml-0">
                Ordenar por:
            </span>

            <x-select wire:model.live="orderBy">
                <option value="1">
                    Relevancia
                </option>
                <option value="2">
                    Precio: Mayor a menor
                </option>
                <option value="3">
                    Precio: Menor a mayor
                </option>
            </x-select>
        </div>
        @if ($products->count() > 0)
            <div class=" px-4 flex flex-wrap justify-evenly min-w-full">

                @foreach ($products as $product)
                    <div>
                        
                        @livewire('products.product-card', ['product' => $product], key('product-' . ($product->sku ?? $product->id) . '-order-' . $orderBy))
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-16 px-4">
                <!-- Icono SVG moderno -->
                <div class="mb-6 p-4 bg-gray-100 rounded-full">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                    </svg>
                </div>

                <!-- Título principal -->
                <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Producto no encontrado
                </h3>

                <!-- Subtítulo descriptivo -->
                <p class="text-gray-600 text-center max-w-md mb-8 leading-relaxed">
                    No pudimos encontrar productos que coincidan con tu búsqueda.
                    Intenta con otros términos o explora nuestras categorías.
                </p>

                <!-- Sugerencias adicionales -->
                <div class="mt-12 w-full max-w-md">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Sugerencias de búsqueda:</h4>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Verifica la ortografía de las palabras</li>
                        <li>• Usa términos más generales</li>
                        <li>• Prueba con sinónimos o palabras relacionadas</li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="mt-8 px-4">
            {{ $products->links() }}
        </div>


    </x-container>
</div>
