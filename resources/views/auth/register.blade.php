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



                <x-authentication-card width="sm:max-w-2xl">
                    <x-slot name="logo">
                        @include('layouts.partials.app.logo')
                    </x-slot>

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <!-- Nombre -->
                            <div>
                                <x-label for="name" value="Nombre(s)" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <!-- Apellido -->
                            <div>
                                <x-label for="last_name" value="Apellidos" />
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                    :value="old('last_name')" required autocomplete="last_name" />
                            </div>

                            <!-- Email -->
                            <div class="">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />
                            </div>

                            <div>
                                <x-label for="phone" value="Teléfono" />
                                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone"
                                    :value="old('phone')" required autocomplete="phone" />
                            </div>

                            <!-- Password -->
                            <div class="">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ms-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-sm text-gray-600   hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  ">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-sm text-gray-600   hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  ">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600   hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  "
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ms-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </x-authentication-card>


            </div>
        </div>
    </div>
</x-guest-layout>
