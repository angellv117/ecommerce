<x-guest-layout>
    <div class="min-h-screen bg-cover bg-center bg-no-repeat relative" style="background-image: url('img/9.png');">


        <div class="relative z-10 min-h-screen flex">
            <!-- Sección izquierda - Welcome -->
            <div class="hidden lg:flex lg:w-1/2 flex-col justify-center px-12 xl:px-20">
                <div class="max-w-lg">
                    <h1 class="text-5xl xl:text-6xl font-bold text-white mb-6 leading-tight">
                        Bienvenido
                        <br>
                    </h1>
                    <p class="text-lg text-white/80 mb-8 leading-relaxed">
                        Fundada desde 1977.
                    </p>


                </div>
            </div>

            <!-- Sección derecha - Sign in -->
            <div class="w-full lg:w-1/2 flex items-center justify-center ">
                <x-authentication-card>
                    <x-slot name="logo">
                        @include('layouts.partials.app.logo')
                    </x-slot>

                    <x-validation-errors class="mb-4" />

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600  ">
                            {{ $value }}
                        </div>
                    @endsession

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600  ">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600   hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  "
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ms-4">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </x-authentication-card>
            </div>
        </div>
    </div>
</x-guest-layout>
