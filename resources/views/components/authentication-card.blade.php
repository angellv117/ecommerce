@props(['width' => 'sm:max-w-md'])

<div class="min-h-screen flex flex-col items-center justify-center bg-blue-800  sm:pt-0 p-5">
    <!-- Logo -->
    <div class="mb-4">
        {{ $logo }}
    </div>

    <!-- Card -->
    <div class="w-full {{ $width }} px-6 py-8 bg-white bg-opacity-90 backdrop-blur-md shadow-xl rounded-2xl border border-gray-100">
        {{ $slot }}
    </div>
</div>
