<x-app-layout>

    <x-container class="min-h-screen px-4 py-5">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-2">
                @livewire('shopping-addresses')
            </div>

            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="bg-blue-800 text-white p-4 rounded-lg flex items-center gap-2 justify-between">
                        <h2 class="text-lg font-bold">Resumen de la compra ( {{ Cart::instance('shopping')->count() }} )</h2>
                        <a href="{{ route('cart.index') }}" class="text-white hover:text-gray-300 transition-colors">
                            <i class="fa-solid fa-cart-shopping text-2xl"></i>
                        </a>
                    </div>
                    <div class="p-4">
                        <div class="bg-white rounded-b-lg p-4 space-y-3 max-h-96 overflow-y-auto">
                            @forelse (Cart::instance('shopping')->content() as $item)
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $item->options->image) }}"
                                         alt="{{ $item->name }}"
                                         class="w-16 h-16 object-contain rounded border border-gray-200">
                        
                                    <p class="text-sm text-gray-800 truncate" title="{{ $item->name }}">
                                        {{ $item->name }} <br>
                                        <span class="text-xs text-gray-500">
                                            ({{ $item->qty }} x {{ $item->price }})
                                        </span>
                                    </p>
                                </div>
                            @empty
                                <p class="text-center text-sm text-gray-500">No hay productos en el carrito</p>
                            @endforelse
                        </div>
                        <button class="w-full custom-button-blue-outline">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Comprar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </x-container>
</x-app-layout>