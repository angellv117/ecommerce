@props(['color' => 'text-white', 'image' => 'img/logo-white.png'])

<a href="/" class="flex items-center space-x-3">
    <img src="{{ asset($image) }}" alt="logo" class="w-12 md:w-16 drop-shadow-lg {{ $color }}">
    <div class="hidden md:block">
        <span class="{{ $color }} font-bold text-lg md:text-xl tracking-tight leading-tight">
            Industria Lechera
        </span>
        <div class="flex items-center">
            <span class="{{ $color }}/90 text-sm">San Juan del Río</span>
            <div class="w-10 h-0.5 bg-blue-300 rounded-full ml-2 opacity-70"></div>
        </div>
    </div>
</a>
