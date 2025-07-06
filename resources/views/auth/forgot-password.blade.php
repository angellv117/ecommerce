<x-guest-layout>
    <div class="min-h-screen bg-cover bg-center bg-no-repeat relative" style="background-image: url('img/9.png');">


        <div class="relative z-10 min-h-screen flex">
            

            <div class="w-full flex items-center justify-center ">

                 <x-authentication-card>
        <x-slot name="logo">
                @include('layouts.partials.app.logo')
            </x-slot>

        <div class="mb-4 text-sm text-gray-600  ">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600  ">
                {{ $value }}
                <br>
                <span class="font-bold">
                    Revise su bandeja de SPAM o correo no deseado.
                </span>
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center mt-4">
                <x-button class="w-full">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
               
            </div>
        </div>

    </div>
</x-guest-layout>
