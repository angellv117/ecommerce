<div class="max-w-4xl mx-auto p-6">


    <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-700 to-blue-800 text-white p-6">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold">Resumen de Orden</h2>
                    <p class="text-blue-100 mt-1">Detalles de tu compra</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-blue-100">ID de Orden</p>
                    <p class="text-lg font-semibold">{{ $order->payment_id ?? '#12345' }}</p>
                </div>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Información de Pago -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Estado y Método de Pago -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="text-sm font-semibold text-gray-600 mb-2">Estado de la Orden</h3>
                            <span
                                class="{{ $order->status->color() }} rounded-full px-2 py-1 font-medium">{{ $order->status->label() }}</span>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="text-sm font-semibold text-gray-600 mb-2">Método de Pago</h3>
                            <div class="flex items-center">
                                <div class="w-10 h-6 bg-blue-700 rounded mr-3 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                                    </svg>
                                </div>
                                <span
                                    class="text-gray-800 font-medium">{{ $order->payment_method ?? 'Tarjeta de Crédito' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dirección de Envío -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-sm font-semibold text-gray-600 mb-3">Dirección de Envío</h3>
                        <div class="space-y-2 text-gray-700">
                            <p class="font-medium">
                                {{ $order->address['address'] ?? 'Av. Benito Juárez 123' }}</p>
                            <p>{{ $order->address['municipality'] ?? 'Centro' }},
                                {{ $order->address['state'] ?? 'Valle de Santiago' }}
                            </p>
                            <p>CP: {{ $order->address['postal_code'] ?? '38400' }}</p>
                        </div>
                    </div>

                    <!-- Detalles de Items -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-sm font-semibold text-gray-600 mb-3">Detalles de Compra</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Número de Items</p>
                                        <p class="text-lg font-semibold text-gray-800">
                                            {{ count($order->content) ?? '3' }} productos
                                        </p>
                                    </div>

                                    <div class="overflow-x-auto rounded-lg border">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                        Imagen</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                        Producto</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                        Cantidad</th>
                                                    <th
                                                        class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                        Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @foreach ($order->content as $item)
                                                    <tr>
                                                        <td class="px-4 py-2">
                                                            @if (!empty($item['options']['image']))
                                                                <img src="{{ Storage::url($item['options']['image']) }}"
                                                                    alt="Producto"
                                                                    class="w-16 h-16 object-cover rounded">
                                                            @else
                                                                <span class="text-gray-500">Sin imagen</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-4 py-2">{{ $item['name'] }}</td>
                                                        <td class="px-4 py-2">{{ $item['qty'] }}</td>
                                                        <td class="px-4 py-2">
                                                            ${{ number_format($item['price'], 2) }} MXN</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resumen de Total -->
                <div class="lg:col-span-1">
                    <div
                        class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 border border-blue-200">
                        <h3 class="text-lg font-semibold text-blue-900 mb-4">Resumen de Pago</h3>

                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="text-gray-800">${{ $order->total ?? 1250 }} MXN</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Envío</span>
                                <span class="text-gray-800">$ 100 MXN</span>
                            </div>
                            <hr class="border-blue-200">
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-blue-900">Total Pagado</span>
                            <span class="text-2xl font-bold text-blue-700">${{ $order->total + 100 }}
                                MXN</span>
                        </div>

                        <div class="mt-4 pt-4 border-t border-blue-200">
                            <p class="text-xs text-blue-600 text-center">
                                Fecha de pago:
                                {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : date('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>

                    <!-- Acciones -->

                    <div class="mt-4 space-y-2">
                        <button wire:click="downloadTicket({{ $order->id }})"
                            class="w-full  bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                            Descargar ticket
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">

                <p class="text-xs text-gray-500">
                    Orden procesada el
                    {{ $order->created_at ? $order->created_at->format('d/m/Y') : date('d/m/Y') }}
                </p>
            </div>
        </div>
    </div>
</div>