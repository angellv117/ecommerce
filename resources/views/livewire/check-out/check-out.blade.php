<div class="text-gray-700" x-data="{
    pago: @entangle('payment_method'),
    status: @entangle('statusCode'),
}">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

        <div x-show="status != 0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm transition-opacity duration-300">
            <div x-show="status == 1"
                class="flex flex-col items-center justify-center bg-white p-8 rounded-2xl shadow-2xl border border-blue-100 w-72 animate-fade-in">
                <!-- SVG Spinner animado -->
                <svg class="animate-spin h-12 w-12 text-blue-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                    </path>
                </svg>

                <!-- Mensaje -->
                <p class="text-gray-800 text-center font-semibold text-base leading-snug" >
                    Espere un momento...
                </p>
                

            </div>
            <div x-show="status == 2"
            class="flex flex-col items-center justify-center bg-white p-8 rounded-2xl shadow-2xl border border-blue-100 w-72 animate-fade-in">
                <i class="fa-solid fa-check-circle text-green-600 text-9xl"></i>
                <p class="text-gray-800 text-center font-semibold text-base leading-snug my-4">
                    Ticket generado correctamente, revise su correo para el ticket, puede estár en la carpeta de spam
                </p>

                <button class="w-full custom-button-blue-outline inline-block text-center" onclick="window.location.href = '{{ route('home') }}'">
                    <span class="hidden lg:block">Ir a la página principal</span>
                    <i class="fa-solid fa-arrow-right lg:hidden"></i>
                </button>
            </div>
        </div>

        <div class="col-span-1" x-show="status == 0">
            <div class="bg-blue-800 text-white p-4 rounded-lg flex items-center gap-2 justify-between mb-2">
                <h2 class="text-lg font-bold">Pago</h2>
            </div>

            <div class="shadow rounded-lg overflow-hidden border border-gray-200">
                <ul class="divide-y divide-gray-200">
                    <li>
                        <label class="p-4 flex items-center">
                            <input type="radio" value="1" x-model="pago" disabled x-on:click="status = 1"
                                wire:click="$set('payment_method', 1)">
                            <span class="ml-2">Tarjeta de débito / crédito</span>
                            <i class="fa-solid fa-credit-card ml-auto"></i>
                        </label>

                        <div class="p-4 bg-gray-100 text-center" x-cloak
                            x-transition:enter="transition linear duration-100"
                            x-transition:enter-start="h-0 overflow-hidden"
                            x-transition:enter-end="h-100 overflow-hidden"
                            x-transition:leave="transition linear duration-100"
                            x-transition:leave-start="h-100 overflow-hidden"
                            x-transition:leave-end="h-0 overflow-hidden" x-show="pago==1">
                            <i class="fa-solid fa-credit-card ml-auto text-9xl"></i>
                        </div>
                    </li>


                    <li>
                        <label class="p-4 flex items-center">
                            <input type="radio" value="2" x-model="pago" wire:click="$set('payment_method', 2)" x-on:click="status = 1">
                            <span class="ml-2">Depósito bancario</span>
                            <i class="fa-solid fa-money-bill-transfer ml-auto"></i>
                        </label>

                        <div class="p-4 bg-gray-100 flex flex-col justify-start" x-cloak
                            x-transition:enter="transition linear duration-100"
                            x-transition:enter-start="h-0 overflow-hidden"
                            x-transition:enter-end="h-100 overflow-hidden"
                            x-transition:leave="transition linear duration-100"
                            x-transition:leave-start="h-100 overflow-hidden"
                            x-transition:leave-end="h-0 overflow-hidden" x-show="pago==2">
                            <h2 class="text-lg">Pago por déposito / transferencia bancaria</h2>
                            <ol class="p-4 flex flex-col gap-2">
                                <li style="list-style-type: circle">Realiza tu déposito / transferencia a esta
                                    cuenta
                                    bancaria
                                    <ul>
                                        <li>XXXXXXXXXXXXXXXXXXXX</li>
                                    </ul>
                                </li>
                                <li style="list-style-type: circle">Razón social: INDUSTRIA LECHERA DE SAN JUAN DEL
                                    RIO
                                </li>
                                <li style="list-style-type: circle">RFC: XXXXXXXXXX</li>
                                <li style="list-style-type: circle">Envía tu comprobante al 427XXXXXXX</li>
                            </ol>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-span-1" x-show="status == 0">
            <div class="bg-blue-800 text-white p-4 rounded-lg flex items-center gap-2 justify-between mb-4">
                <h2 class="text-lg font-bold">Carrito</h2>
                <i class="fa-solid fa-shopping-cart"></i>
            </div>

            <ul class="space-y-4 mb-4">
                @foreach (Cart::instance('shopping')->content() as $item)
                    <li class="flex items-center space-x-4">
                        <div class="flex-shrink-0 relative">
                            <img class="h-16 aspect-square" src="{{ asset('storage/' . $item->options->image) }}"
                                alt="">
                            <span
                                class="flex items-center justify-center h-6 w-6 bg-red-600 text-white rounded-full absolute -right-2 -top-2">{{ $item->qty }}</span>
                        </div>

                        <div class="flex-1">
                            <p>{{ $item->name }}</p>
                        </div>

                        <div class="flex-shrink-0">
                            <p>MXN ${{ $item->price }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="flex justify-between space-x-4 my-4 ">
                <p class="font-semibold">Dirección</p>
                <p class="font-semibold">
                    {{ $address->address . ',' . $address->community . ',' . $address->city . ', ' . $address->postal_code }}
                </p>
            </div>

            <div class="flex justify-between space-x-4">
                <p class="font-semibold">Subtotal</p>
                <p>MXN ${{ Cart::instance('shopping')->subtotal() }}</p>
            </div>

            <div class="flex justify-between space-x-4">
                <p class="font-semibold">Envío</p>
                <p>MXN $100.00</p>
            </div>

            <div class="flex justify-between space-x-4 mb-4">
                @php
                    $subtotal = (float) str_replace(',', '', Cart::instance('shopping')->subtotal());
                    $shipping = 100;
                    $total = $subtotal + $shipping;
                @endphp
                <p class="font-semibold">Total</p>
                <p class="font-semibold">MXN ${{ number_format($total, 2, '.', '') }}</p>
            </div>

            <div>
                <button class="w-full custom-button-blue-outline inline-block text-center" wire:click="pay"
                    x-on:click="status = 1">
                    Realizar pedido y pagar
                </button>
            </div>

        </div>

    </div>

</div>
