<div>
    <form wire:submit="createProduct">

        <div class="card-custom">
            <x-label class="text-sm font-bold">Datos del producto</x-label>

            <div class="flex justify-end">

                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" wire:model.live="product.is_active">
                    <div
                        class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600 ">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900">Visible en la web</span>
                </label>

            </div>
            <div class="grid sm:grid-cols-1  md:grid-cols-2 gap-4">
                <div>
                    <x-label class="text-sm font-bold">SKU</x-label>
                    <x-input name="sku" wire:model="product.sku" label="SKU" class="w-full mb-4"
                        placeholder="Ingrese el SKU del producto" value="{{ old('sku') }}" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Nombre</x-label>
                    <x-input name="name" wire:model="product.name" label="Nombre" class="w-full mb-4"
                        placeholder="Ingrese el nombre del producto" value="{{ old('name') }}" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Precio</x-label>
                    <x-input name="price" wire:model="product.price" label="Precio" class="w-full mb-4"
                        placeholder="Ingrese el precio del producto" value="{{ old('price') }}" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Presentación</x-label>
                    <select name="presentation_id" class="select-custom" wire:model.live="product.presentation_id">
                        <option value="">Seleccione la presentación</option>
                        @foreach ($presentations as $presentation)
                            <option value="{{ $presentation->id }}">{{ $presentation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-label class="text-sm font-bold">Descripción</x-label>
            <x-textarea wire:model="product.description" label="Descripción" class="w-full mb-4"
                placeholder="Ingrese la descripción del producto" value="{{ old('description') }}"></x-textarea>

            <div class="grid sm:grid-cols-1  md:grid-cols-3 gap-4">
                <div>
                    <x-label class="text-sm font-bold">Familia</x-label>
                    <select name="family_id" class="select-custom" wire:model.live="family_id">
                        <option value="">Seleccione la familia</option>
                        @foreach ($families as $family)
                            <option value="{{ $family->id }}">{{ $family->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-label class="text-sm font-bold">Categoría</x-label>
                    <select name="category_id" class="select-custom" wire:model.live="category_id">
                        <option value="">Seleccione la categoría</option>
                        @foreach ($this->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-label class="text-sm font-bold">Subcategoría</x-label>
                    <select name="subcategory_id" class="select-custom" wire:model.live="product.subcategory_id">
                        <option value="">Seleccione la subcategoría</option>
                        @foreach ($this->subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid sm:grid-cols-1  md:grid-cols-2 gap-4 mt-5">
                <div>
                    <x-label class="text-sm font-bold">Temperatura minima de guardado</x-label>
                    <x-input name="min_temperature" wire:model="product.min_temperature"
                        label="Temperatura minima de guardado" class="w-full mb-4"
                        placeholder="Ingrese la temperatura minima de guardado del producto"
                        value="{{ old('min_temperature') }}" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Temperatura maxima de guardado</x-label>
                    <x-input name="max_temperature" wire:model="product.max_temperature"
                        label="Temperatura maxima de guardado" class="w-full mb-4"
                        placeholder="Ingrese la temperatura maxima de guardado del producto"
                        value="{{ old('max_temperature') }}" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Tiempo de derretimiento</x-label>
                    <x-input name="time_to_melt" wire:model="product.time_to_melt" label="Tiempo de derretimiento"
                        class="w-full mb-4" placeholder="Ingrese el tiempo de derretimiento del producto"
                        value="{{ old('time_to_melt') }}" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Temperatura de derretimiento</x-label>
                    <x-input name="temperature_to_melt" wire:model="product.temperature_to_melt"
                        label="Temperatura de derretimiento" class="w-full mb-4"
                        placeholder="Ingrese la temperatura de derretimiento del producto"
                        value="{{ old('temperature_to_melt') }}" />
                </div>
            </div>



            <div x-data="{ dragging: false }" x-on:dragover.prevent="dragging = true"
                x-on:dragleave.prevent="dragging = false"
                x-on:drop.prevent="
                                    dragging = false;
                                    const files = $event.dataTransfer.files;
                                    if (files.length) {
                                        $refs.fileInput.files = files;
                                        $refs.fileInput.dispatchEvent(new Event('change', { bubbles: true }));
                                    }"
                :class="dragging
                    ?
                    'border-blue-500 bg-blue-50 ' :
                    'border-purple-300 bg-gray-50 '"
                class=" mt-10 flex flex-col items-center justify-center w-full border-2 border-dashed rounded-lg cursor-pointer transition-colors duration-200 ease-in-out">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 " xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 ">
                            <span class="font-semibold">Haz clic para subir</span> o arrastra y suelta
                        </p>
                        <p class="text-xs text-gray-500 ">SVG, PNG, JPG o GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" x-ref="fileInput"
                        wire:model="images_path" multiple />
                </label>
            </div>

            <x-label class="text-sm font-bold mt-4">Imagenes subidas</x-label>
            @if ($images_path)
                <div class="flex items-center justify-center">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center justify-center">
                        @foreach ($images_path as $index => $image)
                            <div class="relative group">
                                <img src="{{ $image->temporaryUrl() }}" alt="Imagen del producto"
                                    class="w-40 h-40 object-contain">

                                <!-- Botón eliminar en esquina superior derecha -->
                                <button type="button" x-data
                                    x-on:click="$dispatch('open-modal', {imageIndex: {{ $index }}})"
                                    class="absolute top-0 right-0 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 shadow-lg transform transition-transform duration-200 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 " role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">No hay imagenes subidas</span>
                    </div>
                </div>
            @endif

            <!-- Modal de confirmación -->
            <div x-data="{
                show: false,
                imageIndex: null,
                openModal(event) {
                    this.imageIndex = event.detail.imageIndex;
                    this.show = true;
                },
                closeModal() {
                    this.show = false;
                }
            }" x-on:open-modal.window="openModal($event)" x-show="show" x-cloak
                class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">

                <!-- Fondo oscuro -->
                <div class="fixed inset-0 bg-black opacity-50"></div>

                <!-- Modal -->
                <div class="relative flex items-center justify-center min-h-screen p-4">
                    <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full p-6">
                        <div class="text-center">
                            <svg class="mx-auto mb-4 text-red-500 w-12 h-12" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-medium text-gray-900">¿Estás seguro de eliminar esta imagen?
                            </h3>
                            <p class="text-sm text-gray-500 mb-5">Esta acción no se puede deshacer</p>

                            <div class="flex justify-center space-x-4">
                                <button type="button" x-on:click="closeModal()"
                                    class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">
                                    Cancelar
                                </button>
                                <button type="button" x-on:click="$wire.removeImage(imageIndex); closeModal()"
                                    class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="flex justify-start">
                <x-button class="btn-primary">Guardar</x-button>
            </div>
        </div>
    </form>
</div>
