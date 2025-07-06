<div>
    <section class="bg-white rounded-lg shadow-md">
        <header class=" bg-blue-800 text-white p-4 rounded-lg">
            <h2 class="text-2xl font-bold">Direcciones guardadas</h2>
        </header>
        <div class="p-4">
            <!-- Agregar una direccion -->
            @if ($newAddress)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="col-span-4">
                        <h3 class="text-lg font-bold">Nombre descriptivo de la dirección</h3>
                        <input type="text" wire:model="createAddress.name" placeholder="Nombre"
                            class="w-full p-2 rounded-lg border border-gray-300">

                    </div>
                    <div class="col-span-2">
                        <h3 class="text-lg font-bold">Dirección</h3>
                        <input type="text" wire:model="createAddress.address" placeholder="Dirección"
                            class="w-full p-2 rounded-lg border border-gray-300">
                    </div>
                    <div class="col-span-2">
                        <h3 class="text-lg font-bold">Comunidad</h3>
                        <input type="text" wire:model="createAddress.community" placeholder="Comunidad"
                            class="w-full p-2 rounded-lg border border-gray-300">
                    </div>
                    <div class="col-span-2">
                        <h3 class="text-lg font-bold">Ciudad</h3>
                        <input type="text" wire:model="createAddress.city" placeholder="Ciudad"
                            class="w-full p-2 rounded-lg border border-gray-300">
                    </div>
                    <div class="col-span-2">
                        <h3 class="text-lg font-bold">Estado</h3>
                        <input type="text" wire:model="createAddress.state" placeholder="Estado"
                            class="w-full p-2 rounded-lg border border-gray-300">
                    </div>
                    <div class="col-span-2">
                        <h3 class="text-lg font-bold">País</h3>
                        <input type="text" wire:model="createAddress.country" placeholder="País"
                            class="w-full p-2 rounded-lg border border-gray-300">
                    </div>
                    <div class="col-span-2">
                        <h3 class="text-lg font-bold">Código postal</h3>
                        <input type="text" wire:model="createAddress.postal_code" placeholder="Código postal"
                            class="w-full p-2 rounded-lg border border-gray-300">
                    </div>
                    <div class="col-span-4">
                        <h3 class="text-lg font-bold">Referencia</h3>
                        <textarea wire:model="createAddress.reference" placeholder="Referencia"
                            class="w-full p-2 rounded-lg border border-gray-300"></textarea>
                    </div>

                    <x-validation-errors class="my-8 col-span-4" />

                    <div class="col-span-4" x-data="{
                        receiver_name: @entangle('createAddress.receiver_name'),
                    }">
                        <span class="text-lg font-bold my-2 text-blue-800">Información del receptor</span>
                        <div class="col-span-2">
                            <h3 class="text-lg font-bold">Nombre del receptor</h3>
                            <input type="text" x-model="receiver_name" placeholder="Nombre del receptor"
                                class="w-full p-2 rounded-lg border border-gray-300">
                        </div>
                    </div>


                    <div class="col-span-2">
                        <button wire:click="saveAddress"
                            class="mt-4 w-full custom-button-blue w-1/2 mx-auto flex items-center justify-center">
                            Guardar dirección
                        </button>
                    </div>

                    <div class="col-span-2">
                        <button wire:click="showNewAddressForm"
                            class="mt-4 w-full custom-button-blue-outline w-1/2 mx-auto flex items-center justify-center">
                            Cancelar
                        </button>
                    </div>
                </div>
            @else
             <!-- Editar una direccion -->
                @if ($editAddress->id)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="col-span-4">
                            <h3 class="text-lg font-bold">Nombre descriptivo de la dirección</h3>
                            <input type="text" wire:model="editAddress.name" placeholder="Nombre"
                                class="w-full p-2 rounded-lg border border-gray-300">

                        </div>
                        <div class="col-span-2">
                            <h3 class="text-lg font-bold">Dirección</h3>
                            <input type="text" wire:model="editAddress.address" placeholder="Dirección"
                                class="w-full p-2 rounded-lg border border-gray-300">
                        </div>
                        <div class="col-span-2">
                            <h3 class="text-lg font-bold">Comunidad</h3>
                            <input type="text" wire:model="editAddress.community" placeholder="Comunidad"
                                class="w-full p-2 rounded-lg border border-gray-300">
                        </div>
                        <div class="col-span-2">
                            <h3 class="text-lg font-bold">Ciudad</h3>
                            <input type="text" wire:model="editAddress.city" placeholder="Ciudad"
                                class="w-full p-2 rounded-lg border border-gray-300">
                        </div>
                        <div class="col-span-2">
                            <h3 class="text-lg font-bold">Estado</h3>
                            <input type="text" wire:model="editAddress.state" placeholder="Estado"
                                class="w-full p-2 rounded-lg border border-gray-300">
                        </div>
                        <div class="col-span-2">
                            <h3 class="text-lg font-bold">País</h3>
                            <input type="text" wire:model="editAddress.country" placeholder="País"
                                class="w-full p-2 rounded-lg border border-gray-300">
                        </div>
                        <div class="col-span-2">
                            <h3 class="text-lg font-bold">Código postal</h3>
                            <input type="text" wire:model="editAddress.postal_code" placeholder="Código postal"
                                class="w-full p-2 rounded-lg border border-gray-300">
                        </div>
                        <div class="col-span-4">
                            <h3 class="text-lg font-bold">Referencia</h3>
                            <textarea wire:model="editAddress.reference" placeholder="Referencia"
                                class="w-full p-2 rounded-lg border border-gray-300"></textarea>
                        </div>

                        <x-validation-errors class="my-8 col-span-4" />

                        <div class="col-span-4" x-data="{
                            receiver_name: @entangle('editAddress.receiver_name'),
                        }">
                            <span class="text-lg font-bold my-2 text-blue-800">Información del receptor</span>
                            <div class="col-span-2">
                                <h3 class="text-lg font-bold">Nombre del receptor</h3>
                                <input type="text" x-model="receiver_name" placeholder="Nombre del receptor"
                                    class="w-full p-2 rounded-lg border border-gray-300">
                            </div>
                        </div>


                        <div class="col-span-2">
                            <button wire:click="updateAddress"
                                class="mt-4 w-full custom-button-blue w-1/2 mx-auto flex items-center justify-center">
                                Actualizar dirección
                            </button>
                        </div>

                        <div class="col-span-2">
                            <button wire:click="$set('editAddress.id', null)"
                                class="mt-4 w-full custom-button-blue-outline w-1/2 mx-auto flex items-center justify-center">
                                Cancelar
                            </button>
                        </div>
                    </div>
                @else
                 <!-- Listar las direccion -->
                    @if ($addresses->count() > 0)
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($addresses as $address)
                                <div wire:key="Addresses-{{ $address->id }}"
                                    class="{{ $address->is_default ?? false ? 'bg-blue-50' : ' bg-white' }}  group relative border border-gray-200 hover:border-gray-300 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                                    <!-- Header con nombre y estrella -->
                                    <div class="flex items-center justify-between p-5 pb-3">
                                        <div class="flex items-center space-x-3">
                                            <!-- Icono de ubicación -->
                                            <div
                                                class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>

                                            <!-- Nombre de la dirección -->
                                            <div>
                                                <h3
                                                    class="text-lg font-semibold text-gray-900 group-hover:text-gray-700 transition-colors">
                                                    {{ $address->name }}
                                                </h3>
                                                @if ($address->is_default ?? false)
                                                    <span
                                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-1">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Principal
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Botón estrella para marcar como favorita -->
                                        <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors group/star"
                                            wire:click="setDefaultAddress({{ $address->id }})"
                                            title="Marcar como favorita">
                                            <svg class="w-5 h-5 {{ $address->is_default ?? false ? 'text-yellow-500 fill-current' : 'text-gray-400 group-hover/star:text-yellow-500' }} transition-colors"
                                                fill="{{ $address->is_default ?? false ? 'currentColor' : 'none' }}"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Información de la dirección -->
                                    <div class="px-5 pb-4">
                                        <div class="space-y-2">
                                            <div class="flex items-start space-x-2">
                                                <svg class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                                <p class="text-gray-700 text-sm leading-relaxed">
                                                    {{ $address->address }}
                                                </p>
                                            </div>

                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <p class="text-gray-600 text-sm font-medium">
                                                    {{ $address->city }}</p>

                                                @if ($address->postal_code ?? false)
                                                    <span class="text-gray-400">•</span>
                                                    <p class="text-gray-500 text-sm">
                                                        {{ $address->postal_code }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Acciones -->
                                    <div
                                        class="bg-gray-50 px-5 py-3 flex items-center justify-between border-t border-gray-100">
                                        <!-- Botones de acción -->
                                        <div class="flex items-center space-x-1">
                                            <!-- Botón Editar -->
                                            <button wire:click="edit({{ $address->id }})"
                                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors group/edit"
                                                title="Editar dirección">
                                                <svg class="w-4 h-4 mr-1.5 group-hover/edit:scale-110 transition-transform"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Editar
                                            </button>

                                            <!-- Botón Eliminar -->
                                            <button
                                                wire:click="confirmDelete({{ $address->id }})"
                                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors group/delete"
                                                title="Eliminar dirección">
                                                <svg class="w-4 h-4 mr-1.5 group-hover/delete:scale-110 transition-transform"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Eliminar
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Indicador de hover en el lado izquierdo -->
                                    <div
                                        class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 transform scale-y-0 group-hover:scale-y-100 transition-transform origin-top duration-200">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <div class="text-center">
                            <p>No hay direcciones guardadas</p>
                        </div>
                    @endif



                    @if (!$newAddress)
                        <button wire:click="showNewAddressForm"
                            class="mt-4 custom-button-blue-outline hidden md:block w-1/2 mx-auto flex items-center justify-center">
                            Agregar dirección <i class="fa-solid fa-plus ml-2"></i>
                        </button>
                        <button wire:click="showNewAddressForm"
                            class="mt-4 custom-button-blue-outline md:hidden w-1/2 mx-auto flex items-center justify-center">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    @endif
                @endif
            @endif
        </div>
    </section>
</div>
@push('scripts')
<script>
    Livewire.on('confirm-delete', id => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteAddress', id);
            }
        });
    });
</script>
@endpush