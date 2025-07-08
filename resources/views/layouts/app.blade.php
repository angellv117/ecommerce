<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/5801ce9300.js" crossorigin="anonymous"></script>
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100  ">
        {{-- @livewire('navigation-menu') --}}
        @livewire('navigation', ['cartCount' => $cartItemsCount])
        <!-- Page Content -->
        <main class="bg-white">
            {{ $slot }}
        </main>

        <!--Footer-->
        <div>
            @include('layouts.partials.app.footer')
        </div>

        <!-- Modal -->
        <x-modalfuture id="future-modal" title="Función en desarrollo">
            <p class="text-sm text-gray-700">
                Esta función está en desarrollo. espere que se implemente en una próxima actualización.
            </p>
        </x-modalfuture>
    </div>

    @stack('modals')


    <!--sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @livewireScripts

    @stack('scripts')

    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif

    @if (session('swal-check-out'))
        <script>
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        </script>
    @endif

    <script>
        Livewire.on('swal', (data) => {
            Swal.fire(data[0]);
        });
    </script>

</body>

</html>
