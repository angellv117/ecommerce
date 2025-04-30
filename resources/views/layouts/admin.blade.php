@props(['breadcrumb' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel de administración</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/5801ce9300.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])




    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased" x-data="{ sidebarOpen: false }" :class="{ 'overflow-y-hidden': sidebarOpen }"">

    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 sm:hidden" x-show="sidebarOpen" x-transition
        x-on:click="sidebarOpen = false" style="display: none;">
    </div>

    <!-- Navigation -->
    @include('layouts.partials.admin.navigation')

    <!-- Sidebar -->
    @include('layouts.partials.admin.sidebar')

    <!-- Content -->
    <div class="p-4 sm:ml-64">
        <!-- Breadcrumb -->
        <div class="mt-24">

            <div class="flex justify-between items-center">
                @include('layouts.partials.admin.breadcrumb')

                @isset($actionButton)
                    {{ $actionButton }}
                @endisset
            </div>

            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">

                {{ $slot }}
            </div>
        </div>
    </div>

    <!--sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts

    @stack('scripts')

    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif

    <script>
        Livewire.on('swal', (data) => {
            Swal.fire(data[0]);
        });
    </script>


</body>

</html>
