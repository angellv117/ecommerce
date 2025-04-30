<x-admin-layout :breadcrumb="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Portadas',
        'route' => route('admin.covers.index'),
    ],
    [
        'name' => 'Nueva portadas',
    ],
]">
    <div class="">
        <div class="bg-white rounded-xl shadow-sm">
            <form action="{{ route('admin.covers.store') }}" method="POST" class="card-custom "
                enctype="multipart/form-data">
                @csrf

                <!-- Título -->
                <div class="mb-2">
                    <x-label class="text-sm font-bold mb-1 text-gray-700">Título</x-label>
                    <x-input name="title" label="Título"
                        class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Ingrese el título de la portada" value="{{ old('title') }}" />
                </div>

                <!-- Fechas - Grid para desktop -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                    <!-- Fecha de inicio -->
                    <div>
                        <x-label for="start_date" class="text-sm font-bold mb-1 text-gray-700">Fecha de inicio</x-label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker type="date" name="start_date" id="start_date"
                                value="{{ old('start_date', now()->format('Y-m-d')) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="Seleccionar fecha">
                        </div>
                    </div>

                    <!-- Fecha de fin -->
                    <div>
                        <x-label for="end_date" class="text-sm font-bold mb-1 text-gray-700">Fecha de fin (Opcional)</x-label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker type="date" name="end_date" id="end_date"
                                value="{{ old('end_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                placeholder="Seleccionar fecha">
                        </div>
                    </div>
                </div>
                <!-- Estado Activo -->
                <div class="mb-2" x-data="{ isActive: {{ old('is_active', 'true') }} }">
                    <x-label class="text-sm font-bold mb-3 text-gray-700">Estado</x-label>

                    <!-- Este input hidden se envía siempre y asegura que el campo esté presente -->
                    <input type="hidden" name="is_active" value="0">

                    <label class="inline-flex items-center cursor-pointer">
                        <!-- Este checkbox solo se envía si está marcado -->
                        <input type="checkbox" value="1" class="sr-only peer" name="is_active"
                            checked="{{ old('is_active', true) ? 'checked' : '' }}">
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600 ">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900">Visible en la web</span>
                    </label>
                </div>


                <!-- Subida de imagen -->
                <div x-data="{
                    dragging: false,
                    imagePreview: null,
                    handleFileSelect(event) {
                        const file = event.target.files[0];
                        if (file && file.type.match('image.*')) {
                            let reader = new FileReader();
                            reader.onload = e => {
                                this.imagePreview = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                }" x-on:dragover.prevent="dragging = true"
                    x-on:dragleave.prevent="dragging = false"
                    x-on:drop.prevent="
                        dragging = false;
                        const files = $event.dataTransfer.files;
                        if (files.length) {
                            $refs.fileInput.files = files;
                            $refs.fileInput.dispatchEvent(new Event('change', { bubbles: true }));
                        }"
                    class="mt-6 aspect-[3/1] object-cover w-full">

                    <x-label class="text-sm font-bold mb-3 text-gray-700">Imagen de portada</x-label>

                    <!-- Vista previa de la imagen -->
                    <div x-show="imagePreview" class="mb-4 flex flex-col items-center">
                        <div class="relative">
                            <img :src="imagePreview"
                                class="aspect-[3/1] w-full object-cover rounded-lg shadow-md border border-gray-200">
                            <button type="button" @click="imagePreview = null; $refs.fileInput.value = ''"
                                class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <span class="text-sm text-gray-500 mt-2">Vista previa de la imagen</span>
                    </div>

                    <!-- Área de drop/upload -->
                    <div x-show="!imagePreview"
                        :class="dragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300 bg-gray-50'"
                        class="flex flex-col items-center justify-center aspect-[3/1] w-full border-2 border-dashed rounded-lg cursor-pointer transition-colors duration-200 ease-in-out py-6">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold">Haz clic para subir</span> o arrastra y suelta
                                </p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG o GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" x-ref="fileInput"
                                @change="handleFileSelect($event)" name="image_path" accept="image/*" />
                        </label>
                    </div>
                </div>
                

                <!-- Botones de acción -->
                <div class="flex justify-start space-x-3 border-t mt-4 border-gray-100">
                    <x-button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                        Guardar</x-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
