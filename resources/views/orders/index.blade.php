<x-app-layout>
    <x-container class="px-4 py-5">
        <div class="space-y-3">
            <h1 class="text-2xl font-bold text-gray-900">Mis ordenes</h1>
            @foreach ($orders as $order)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200">
                <!-- Header Minimalista -->
                <div class="border-b border-gray-50 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Orden #{{ $order->payment_id ?? '12345' }}</h2>
                                <p class="text-sm text-gray-500">{{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : date('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900">${{ $order->total + 100 }} MXN</p>
                            <p class="text-sm font-medium {{ $order->status->color() }} rounded-full px-2 py-1">
                                {{ $order->status->label() }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contenido Principal -->
                <div class="px-6 py-4">
                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 items-center">
                        
                        <!-- Método de Pago -->
                        <div class="lg:col-span-1">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-7 bg-gray-800 rounded-md flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Método de Pago</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $order->payment_method ?? 'Tarjeta de Crédito' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="lg:col-span-2">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Dirección de Envío</p>
                                <p class="text-sm font-medium text-gray-900">{{ $order->address['address'] ?? 'Av. Benito Juárez 123' }}</p>
                                <p class="text-sm text-gray-500">{{ $order->address['municipality'] ?? 'Centro' }}, {{ $order->address['state'] ?? 'Valle de Santiago' }} - CP: {{ $order->address['postal_code'] ?? '38400' }}</p>
                            </div>
                        </div>

                        <!-- Items y Desglose -->
                        <div class="lg:col-span-1">
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ count($order->content) ?? '3' }} items</p>
                                        <p class="text-xs text-gray-500">Subtotal: ${{ $order->total }} + Envío: $100</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Acciones -->
                        <div class="lg:col-span-1">
                            <div class="flex space-x-2 items-end justify-end">
                                <button class="custom-button-blue-outline " onclick="window.location.href='{{ route('orders.show', $order->id) }}'">
                                    Ver orden
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Paginación -->
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
    </x-container>
</x-app-layout>