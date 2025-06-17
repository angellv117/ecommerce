<div x-data="{ isOpen: false }">


    <!--navbar-->
    @include('livewire.component.navbar', ['cartCount' => $cartCount])

    <!--sidebar-->
    @include('livewire.component.sidebar')

    @stack('js')
</div>