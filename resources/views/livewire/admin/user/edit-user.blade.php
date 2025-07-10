<div class="min-h-screen  py-4">
    <div class="m-4">
        <!-- Header con animación -->
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-500 rounded-full shadow-lg mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-2">
                Perfil de Usuario
            </h1>
            <p class="text-gray-600 text-lg">Información detallada y estadísticas del usuario</p>
        </div>

        <!-- Main Profile Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 overflow-hidden mb-8">
            <!-- Profile Header con glassmorphism -->
            <div class="relative bg-blue-500 p-8">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="relative flex items-center space-x-6">
                    <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-2xl border border-white/30">
                        <span class="text-3xl font-bold text-white">
                            {{ substr($user->name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                        </span>
                    </div>
                    <div class="text-white">
                        <h2 class="text-3xl font-bold mb-2">{{ $user->name }} {{ $user->last_name }}</h2>
                        <div class="flex items-center space-x-3">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 backdrop-blur-sm text-white border border-white/30">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $user->role->name ?? 'Sin rol asignado' }}
                            </span>
                            <span class="text-blue-100 text-sm">ID: #{{ $user->id }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Email Card -->
                    <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100 hover:shadow-lg transition-all duration-300 hover:scale-105">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-blue-600 mb-1">Correo Electrónico</p>
                                <p class="text-gray-900 font-semibold text-lg">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div class="group bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl p-6 border border-emerald-100 hover:shadow-lg transition-all duration-300 hover:scale-105">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-emerald-600 mb-1">Teléfono</p>
                                <p class="text-gray-900 font-semibold text-lg">{{ $user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Registration Date -->
                    <div class="group bg-gradient-to-br from-purple-50 to-violet-50 rounded-2xl p-6 border border-purple-100 hover:shadow-lg transition-all duration-300 hover:scale-105">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold text-gray-900">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</p>
                                <p class="text-sm text-purple-600 font-medium">Miembro desde</p>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y - H:i') }}
                        </div>
                    </div>

                    <!-- Orders Count -->
                    <div class="group bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 border border-orange-100 hover:shadow-lg transition-all duration-300 hover:scale-105">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold text-gray-900">{{ $user->orders->count() }}</p>
                                <p class="text-sm text-orange-600 font-medium">Pedidos</p>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500">
                            @if($user->orders->count() > 0)
                                Último: {{ $user->orders->sortByDesc('created_at')->first()->created_at->format('d/m/Y') }}
                            @else
                                Sin pedidos realizados
                            @endif
                        </div>
                    </div>

                    <!-- Addresses Count -->
                    <div class="group bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-6 border border-teal-100 hover:shadow-lg transition-all duration-300 hover:scale-105">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold text-gray-900">{{ $user->addresses->count() }}</p>
                                <p class="text-sm text-teal-600 font-medium">Direcciones</p>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500">
                            @if($user->addresses->count() > 0)
                                Registradas en el sistema
                            @else
                                Sin direcciones registradas
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4">

            
            <div class="flex space-x-3">
                <button class="custom-button-blue">

                    <span class="font-medium">Editar Usuario</span>
                </button>
                
                <a href="{{ route('admin.orders.index', ['userId' => $user->id]) }}" type="button"
                class="custom-button-blue-outline">

                 <span class="font-medium">Ver Pedidos</span>
             </a>
            </div>
        </div>
    </div>
</div>