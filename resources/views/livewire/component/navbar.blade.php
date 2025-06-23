<header class="bg-gradient-to-r from-blue-800 to-blue-700 shadow-md">
    <div class="container mx-auto">
        <div class="flex items-center justify-between py-3 px-4 md:px-6">
            <!-- Left section with logo and menu button -->
            <div class="flex items-center space-x-4">
                <button x-on:click="isOpen = true"
                    class="text-white p-2 rounded-lg hover:bg-blue-600/50 transition-colors">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>

                @include('layouts.partials.app.logo')
            </div>

            <!-- Right section with search and icons -->
            <div class="flex items-center space-x-3 md:space-x-5">
                <div class="relative hidden md:block w-64 lg:w-80">
                    <input type="text" oninput="search(this.value)" placeholder="Buscar producto"
                        class="w-full px-4 py-2 pr-10 rounded-full text-sm border-none focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button
                        class="absolute right-0 top-0 h-full px-3 text-gray-500 hover:text-blue-700 transition-colors">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <!-- Mobile search button -->
                <button class="md:hidden text-white p-2 rounded-lg hover:bg-blue-600/50 transition-colors">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <!-- Cart button with counter -->
                <div class="relative">
                    <a href="{{route('cart.index')}}" class="text-white p-2 rounded-lg hover:bg-blue-600/50 transition-colors relative">
                        <i class="fa-solid fa-cart-shopping text-lg"></i>
                        
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                            {{ $cartCount }}</span>
                    </a>
                    
                </div>

                <!-- User dropdown button -->
                <x-dropdown>
                    <x-slot name="trigger">
                        <div class="relative">
                            @auth
                                <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <button
                                    class="text-white p-2 rounded-lg hover:bg-blue-600/50 transition-colors flex items-center">
                                    <i class="fa-solid fa-user text-lg"></i>
                                    <i class="fa-solid fa-chevron-down ml-1 text-xs hidden md:inline-block"></i>
                                </button>
                            @endauth
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        @guest
                            <x-responsive-nav-link href="{{ route('login') }}">
                                Iniciar sesión
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('register') }}">
                                Registrarse
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link href="{{ route('profile.show') }}">
                                Mi cuenta
                            </x-responsive-nav-link>
                            <div class="border-t border-blue-700 mx-5"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        @endguest
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    <!-- Mobile search bar that can be toggled -->
    <div class="md:hidden bg-blue-800 py-2 px-4">
        <div class="relative">
            <input type="text" oninput="search(this.value)" placeholder="Buscar producto"
                class="w-full px-4 py-2 pr-10 rounded-full text-sm border-none focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button class="absolute right-0 top-0 h-full px-3 text-gray-500">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>

    @push('js')
        <script>
            function search(value){
                Livewire.dispatch('search', {
                    search: value
                })
            }
        </script>
    @endpush

</header>
