@if (count($breadcrumb))
    <nav aria-label="Breadcrumb">
        <ol class="inline-flex flex-wrap items-center space-x-1 md:space-x-3">

            @foreach ($breadcrumb as $item)
                <li class="inline-flex items-center {{ !$loop->first ? 'before:content-["/"] before:mx-2' : '' }}">
                    @isset($item['route'])
                        <a href="{{ $item['route'] }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 ">
                            {{ $item['name'] }}
                        </a>
                    @else
                        {{ $item['name'] }}
                    @endisset
                </li>
            @endforeach



        </ol>

        <h1 class="text-2xl font-bold text-gray-700 hover:text-gray-900">
            {{ $breadcrumb[count($breadcrumb) - 1]['name'] }}
        </h1>
    </nav>
@endif
