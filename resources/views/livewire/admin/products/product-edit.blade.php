<div>
    {{ $family_id }}
    {{ $category_id }}
    <form wire:submit="updateProduct">
        <div class="card-custom">
            <x-label class="text-sm font-bold">Datos del producto</x-label>

            <div class="flex justify-end">

                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" wire:model.live="productEdit.is_active">
                    <div
                        class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600 ">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900">Visible en la web</span>
                </label>

            </div>
            <div class="grid sm:grid-cols-1  md:grid-cols-2 gap-4">
                <div>
                    <x-label class="text-sm font-bold">SKU</x-label>
                    <x-input name="sku" wire:model="productEdit.sku" label="SKU" class="w-full mb-4"
                        placeholder="Ingrese el SKU del producto" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Nombre</x-label>
                    <x-input name="name" wire:model="productEdit.name" label="Nombre" class="w-full mb-4"
                        placeholder="Ingrese el nombre del producto" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Precio</x-label>
                    <x-input name="price" wire:model="productEdit.price" label="Precio" class="w-full mb-4"
                        placeholder="Ingrese el precio del producto" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Presentación</x-label>
                    <select name="presentation_id" class="select-custom" wire:model.live="productEdit.presentation_id">
                        <option value="">Seleccione la presentación</option>
                        @foreach ($presentations as $presentation)
                            <option value="{{ $presentation->id }}">{{ $presentation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-label class="text-sm font-bold">Descripción</x-label>
            <x-textarea wire:model="productEdit.description" label="Descripción" class="w-full mb-4"
                placeholder="Ingrese la descripción del producto"></x-textarea>

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
                    <select name="subcategory_id" class="select-custom" wire:model.live="productEdit.subcategory_id">
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
                    <x-input name="min_temperature" wire:model="productEdit.min_temperature"
                        label="Temperatura minima de guardado" class="w-full mb-4"
                        placeholder="Ingrese la temperatura minima de guardado del producto" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Temperatura maxima de guardado</x-label>
                    <x-input name="max_temperature" wire:model="productEdit.max_temperature"
                        label="Temperatura maxima de guardado" class="w-full mb-4"
                        placeholder="Ingrese la temperatura maxima de guardado del producto"
                        value="{{ old('max_temperature') }}" />
                </div>
                <div>
                    <x-label class="text-sm font-bold">Tiempo de derretimiento</x-label>
                    <x-input name="time_to_melt" wire:model="productEdit.time_to_melt" label="Tiempo de derretimiento"
                        class="w-full mb-4" placeholder="Ingrese el tiempo de derretimiento del producto"
                        value="{{ old('time_to_melt') }}" />
                </div>

                <div>
                    <x-label class="text-sm font-bold">Temperatura de derretimiento</x-label>
                    <x-input name="temperature_to_melt" wire:model="productEdit.temperature_to_melt"
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
                        wire:model.live="images_uploaded" multiple />
                </label>
            </div>

            <x-label class="text-sm font-bold mt-4">Imagenes subidas</x-label>
            @if ($images_path || $images_uploaded)
                <div class="flex items-center justify-center">
                    @if ($images_path)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center justify-center">
                            <div
                                class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center justify-center border-2 border-gray-300 rounded-lg p-4">
                                @foreach ($images_path as $image)
                                    <div class="relative group">
                                        <img src="{{ Storage::url($image['path']) }}" alt="Imagen del producto"
                                            class="w-40 h-40 object-contain">
                                        <!-- Botón eliminar en esquina superior derecha -->
                                        <button type="button" x-data
                                            onclick="deleteImage({{ $image['id'] }}, 'database', '{{ $image['path'] }}')"
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
                    @endif
                    @if ($images_uploaded)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center justify-center">

                            @foreach ($images_uploaded as $index => $image)
                                <div class="relative group">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Imagen del producto"
                                        class="w-40 h-40 object-contain">

                                    <!-- Botón eliminar en esquina superior derecha -->
                                    <button type="button" x-data
                                        onclick="deleteImage({{ $index }}, 'uploaded')"
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
                    @endif
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


        <div class="flex justify-start mt-4 space-x-4">
            <x-button class="btn-primary">Guardar</x-button>
            <x-danger-button type="button" class="btn-secondary"
                onclick="confirmDelete()">Eliminar</x-danger-button>
        </div>
</div>
</form>

@push('scripts')
    <script>
        function confirmDelete() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción eliminará la familia de productos',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).deleteProduct();
                }
            });
        }

        function deleteImage(imageIndex, deleteType, path) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción eliminará la imagen del producto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).removeImage(
                        imageIndex, deleteType, path);
                }
            });
        }
    </script>
@endpush
</div>
