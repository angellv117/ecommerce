

<header class="fixed top-0 z-50 w-full bg-gradient-to-r from-blue-800 to-blue-700 shadow-md">
    <div class="container mx-auto">
        <div class="flex items-center justify-between py-3 px-4 md:px-6">
            <!-- Left section with logo and menu button -->
            <div class="flex items-center space-x-4">
                <button x-on:click = "sidebarOpen = true"
                    class="text-white p-2 rounded-lg hover:bg-blue-600/50 transition-colors">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>

                <a href="/" class="flex items-center space-x-3">
                    <img src="{{ asset('img/logo-white.png') }}" alt="logo" class="w-12 md:w-16 drop-shadow-lg">
                    <div class="hidden md:block">
                        <span class="text-white font-bold text-lg md:text-xl tracking-tight leading-tight">
                            Industria Lechera
                        </span>
                        <div class="flex items-center">
                            <span class="text-white/90 text-sm">San Juan del Río</span>
                            <div class="w-10 h-0.5 bg-blue-300 rounded-full ml-2 opacity-70"></div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Right section with search and icons -->
            <div class="flex items-center space-x-3 md:space-x-5">


                <!-- User dropdown button -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500   bg-white   hover:text-gray-700   focus:outline-none focus:bg-gray-50   active:bg-gray-50  transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif

                        <div class="border-t border-gray-200  "></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>


</header>
