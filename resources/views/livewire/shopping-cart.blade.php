<div class="py-4">
    

    <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">

        <div class="lg:col-span-5">
            <div class="flex justify-between mb-2">
                <h1 class="text-lg">
                Carrito de compras ({{Cart::count()}} productos)
            </h1>

            <button class="font-semibold text-gray-600 underline hover:no-underline"
            wire:click="destroy()">
                Limpiar carrito
            </button>
            </div>

            <div class="card-custom">
                <ul class="space-y-4">

                    @forelse (Cart::content() as $item)
                        
                        <li class="lg:flex mr-2">
                            <img class="w-full lg:w-36 aspect-[16/9] object-cover object-center" src="{{$item->options->image}}" alt="">

                            <div class="w-80">
                                <p class="text-sm">
                                    <a href="{{route('products.show', $item->id)}}">
                                        {{$item->name}}
                                    </a>
                                </p>

                                <button class="bg-red-300 text-red-600 font-semibold p-2 text-xs py-0.5 px-2.5 rounded"
                                wire:click="remove('{{$item->rowId}}')">
                                    <i class="fa-solid fa-xmark"></i>
                                    Eliminar
                                </button>
                            </div>

                            <p>
                                MXN ${{$item->price}}
                            </p>

                            <div class="ml-auto">
                           <div class="flex items-center gap-3 w-fit border border-gray-300 rounded-lg px-3 py-1.5">
                            <button type="button"
                                class="text-lg text-gray-600 hover:text-primary-700"
                                wire:click="decrease('{{$item->rowId}}')">
                                –
                            </button>
                            <span id="quantity" min="1"
                                class="w-12 text-center border-none focus:ring-0 text-gray-800 text-sm font-semibold bg-transparent" >{{$item->qty}}</span>
                            <button type="button" 
                                class="text-lg text-gray-600 hover:text-primary-700"
                                wire:click="increase('{{$item->rowId}}')">
                                +
                            </button>
                        </div>
                        </div>
                        </li>

                        @empty 
                        <p class="text-center">
                            No hay productos en el carrito
                        </p>

                    @endforelse

                </ul>
            </div>
        </div>

        <div class="lg:col-span-2">

            <div class="card-custom">
                <div class="flex justify-between text-bold mb-4">
                    <p>Total:</p>
                    <p>MXN ${{Cart::subtotal()}}</p>
                </div>

                <a href="" class="custom-button custom-button-blue block w-full text-center">Continuar compra</a>
            </div>

        </div>

    </div>

</div>
