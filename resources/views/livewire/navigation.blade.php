<div x-data="{ isOpen: false }">


    <!--navbar-->
    @include('livewire.component.navbar')

    <!--sidebar-->
    @include('livewire.component.sidebar')

    @stack('js')
</div>