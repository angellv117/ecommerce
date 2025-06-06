<div class="bg-white py-12">
    <x-container>


        <div class="flex items-center mb-8">
            <span class="mr-2 ml-4 sm:ml-0">
                Ordenar por:
            </span>

            <x-select wire:model.live="orderBy">
                <option value="1">
                    Relevancia
                </option>
                <option value="2">
                    Precio: Mayor a menor
                </option>
                <option value="3">
                    Precio: Menor a mayor
                </option>
            </x-select>
        </div>

        <div class=" px-4 flex flex-wrap justify-evenly min-w-full">
            
        @foreach ($products as $product)
            <div>
                @include('layouts.partials.app.card-product', ['product' => $product])
            </div>
        @endforeach
        </div>

        <div class="mt-8 px-4">
            {{$products->links()}}
        </div>
        

    </x-container>
</div>
