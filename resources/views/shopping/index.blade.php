<x-app-layout>

    <x-container class="min-h-screen px-4 py-5">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-2">
                @livewire('shopping-addresses')
            </div>

            <div class="col-span-1">
                @livewire('cart-summary')
            </div>
        </div>

    </x-container>
</x-app-layout>