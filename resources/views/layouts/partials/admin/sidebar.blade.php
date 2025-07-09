@php
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'url' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Administración de productos',
        ],
        [
            // Familias de productos
            'name' => 'Familias',
            'icon' => 'fa-solid fa-users',
            'url' => route('admin.families.index'),
            'active' => request()->routeIs('admin.families.*'),
        ],
        [
            'name' => 'Categorías',
            'icon' => 'fa-solid fa-layer-group',
            'url' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
        ],
        [
            'name' => 'Sub Categorias',
            'icon' => 'fa-solid fa-bars-staggered',
            'url' => route('admin.subcategories.index'),
            'active' => request()->routeIs('admin.subcategories.*'),
        ],

        [
            'name' => 'Presentaciones',
            'icon' => 'fa-solid fa-cube',
            'url' => route('admin.presentations.index'),
            'active' => request()->routeIs('admin.presentations.*'),
        ],
        [
            'name' => 'Productos',
            'icon' => 'fa-solid fa-cheese',
            'url' => route('admin.products.index'),
            'active' => request()->routeIs('admin.products.*'),
        ],
        [
            'header' => 'Administración de apariencias',
        ],
        [
            'name' => 'Portadas',
            'icon' => 'fa-solid fa-image',
            'url' => route('admin.covers.index'),
            'active' => request()->routeIs('admin.covers.*'),
        ],
        [
            'header' => 'Administración de ordenes y pedidos',
        ],
        [
            'name' => 'Ordenes',
            'icon' => 'fa-solid fa-shopping-cart',
            'url' => route('admin.orders.index'),
            'active' => request()->routeIs('admin.orders.*'),
        ],

    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100vh] pt-28 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0    "
    aria-label="Sidebar"
    :class="{
        'translate-x-0 ease-in-out duration-300': sidebarOpen,
        '-translate-x-full ease-in-out duration-300': !
            sidebarOpen
    }">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white  ">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li ">

                    @isset($link['header'])
                        <div class="px-3 py-2 text-sm text-gray-500 font-bold">
                            {{ $link['header'] }}
                        </div>
                    @else
                        <a href="{{ $link['url'] }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-gray-100 dagroup 
                        {{ $link['active'] ? 'bg-gray-900 text-white hover:bg-gray-900' : '' }}">
                            
                            <i class="{{ $link['icon'] }}"></i>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    @endisset
                </li>
 @endforeach
        </ul>
    </div>
</aside>
