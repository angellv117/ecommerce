<!-- Sidebar overlay with smooth transition - Using x-cloak to prevent flash -->
<div x-show="isOpen" 
     x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-10"
     x-on:click="isOpen = false">
</div>

<!-- Main sidebar container with improved layout and transitions -->
<div x-show="isOpen" 
     x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="-translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="-translate-x-full"
     class="fixed top-0 left-0 z-20 flex h-screen w-full">
    
    <!-- Left sidebar with gradient background -->
    <div class="w-44 md:w-80 h-screen bg-gradient-to-b from-blue-700 to-blue-900 text-white overflow-hidden flex-shrink-0">
        <div class="px-6 py-5 w-full">
            <div class="flex flex-col items-center pb-6">
                <img src="{{ asset('img/logo-white.png') }}" alt="logo" class="w-16 md:w-20 drop-shadow-lg mb-2">
                <span class="text-white text-sm font-bold tracking-wide">
                    Tienda en línea
                </span>
                <div class="w-16 h-1 bg-blue-300 rounded-full mt-2 opacity-70"></div>
            </div>
            
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-medium">¡Bienvenido!</span>
                <button class="text-white hover:text-blue-200 transition-colors p-2 rounded-full hover:bg-blue-800/50">
                    <i x-on:click="isOpen = false" class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <!-- Categories list with hover effects -->
        <div class="px-4 py-2 overflow-auto h-full">
            <ul class="space-y-1">
                @foreach ($families as $family)
                    <li wire:click="$set('family_id', {{ $family->id }})"
                        wire:mouseover="$set('family_id', {{ $family->id }})"
                        class="relative group">
                        <a class="flex p-3 justify-between items-center rounded-lg transition-all duration-200
                                hover:bg-white/10 hover:shadow-md hover:translate-x-1">
                            <span class="font-medium group-hover:text-blue-200 transition-colors flex items-center">
                                <i class="fa-solid fa-layer-group mr-2 opacity-70"></i>
                                {{ $family->name }}
                            </span>
                            <i class="fa-solid fa-chevron-right text-xs opacity-70 group-hover:opacity-100 transition-all"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
            
            <!-- User controls at bottom -->
            <div class="mt-10 pt-4 border-t border-blue-600/40">
                @auth
                    <div class="flex items-center p-3 rounded-lg hover:bg-white/10 transition-colors cursor-pointer" x-on:click="window.location.href = '{{ route('profile.show') }}'">
                    <div class="w-8 h-8 rounded-full bg-blue-400/30 flex items-center justify-center mr-3">
                        <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                    </div>
                    <span class="text-sm font-medium">Mi cuenta</span>
                </div>
                @else
                    <div class="flex items-center p-3 rounded-lg hover:bg-white/10 transition-colors cursor-pointer" x-on:click="window.location.href = '{{ route('login') }}'">
                        <div class="w-8 h-8 rounded-full bg-blue-400/30 flex items-center justify-center mr-3">
                            <i class="fa-solid fa-user text-sm"></i>
                        </div>
                        <span class="text-sm font-medium">Iniciar sesión</span>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Right content area with shadow and rounded corner - Fixed for mobile -->
    <div class="flex-1 h-screen md:w-[57rem] bg-gray-50 overflow-hidden shadow-inner rounded-l-3xl">
        <!-- Header with search bar -->
        <div class="bg-white p-4 md:p-5 shadow-sm">

        </div>
        
        <!-- Categories display with enhanced styling -->
        <div class="h-[calc(100vh-120px)] overflow-auto p-4 md:p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <span class="text-xl md:text-2xl font-bold text-blue-800">{{ $this->familyName }}</span>
                    <div class="w-12 h-1 bg-blue-500 rounded-full mt-1"></div>
                </div>

                <button class="text-sm bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg hidden md:flex items-center transition-colors shadow-sm">
                    Ver todos
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
                <button class="text-sm bg-blue-700 hover:bg-blue-800 text-white p-2 rounded-lg md:hidden transition-colors shadow-sm">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($this->categories as $category)
                    <div class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                        <span class="text-lg font-bold text-blue-700 flex items-center">
                            <i class="fa-solid fa-tag mr-2 text-blue-500 opacity-70"></i>
                            {{ $category->name }}
                        </span>
                        <div class="mt-3 space-y-1">
                            @foreach ($category->subcategories as $subcategory)
                                <a class="flex items-center text-gray-700 hover:text-blue-600 hover:bg-blue-50 p-2 rounded-md transition-colors">
                                    <span class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-2"></span>
                                    <span class="text-sm">{{ $subcategory->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- x-cloak -->
<style>
    [x-cloak] {
        display: none !important;
    }
</style>