<div class="relative w-full h-28 bg-blue-700 mt-10">
    @include('layouts.partials.app.wave-top')

    @include('layouts.partials.app.wave-buttom')
</div>

<!-- Firma minimalista de la empresa con logo como imagen -->
<div class="mt-5 text-center">
    <div class="w-32 h-32 md:w-48 md:h-48 rounded-full overflow-hidden mx-auto mb-4 shadow-sm">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Industria Lechera" class="w-full h-full object-cover object-center">
    </div>
    <p class="text-sm text-slate-400 font-light tracking-widest uppercase">Industria Lechera de San Juan del Río</p>
    <div class="h-px w-12 bg-slate-200 mx-auto my-6"></div>
    <p class="text-xs text-slate-400">S.A.P.I. de C.V.</p>
</div>
<!-- Contenedor principal con layout flexible -->
<div class="flex flex-col justify-center items-center m-5">

    <!-- VISIÓN con imagen lateral -->
    <div class="flex flex-col md:flex-row gap-8 items-center">

        <section class="py-5 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row items-center justify-between gap-12">

                    <!-- Contenido de Texto -->
                    <div class="w-full md:w-1/2 space-y-6">
                        <div class="inline-block">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">NUESTRA
                                EMPRESA</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold">
                            <span class=" text-blue-700">Visión</span>
                        </h2>
                        <div class="w-20 h-1 bg-blue-500 rounded-full"></div>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Ser una empresa líder reconocida por nuestros productos alimenticios inocuos y de calidad en
                            el
                            mercado nacional e internacional con soluciones integrales, el servicio y el sabor que nos
                            distingue siendo responsables con la sociedad y el medio ambiente.
                        </p>

                    </div>

                    <!-- Imagen -->
                    <div class="w-full md:w-1/3 relative">
                        <div class="relative group">
                            <div class="relative">
                                <div class="overflow-hidden rounded-full aspect-square">
                                    <img src="{{ asset('img/p7.jpg') }}" alt="Nuestra visión empresarial"
                                        class="w-full h-full object-cover object-center transition-all duration-500 transform group-hover:scale-110">

                                    @include('layouts.partials.app.wave-buttom')
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </section>

    </div>



    <!-- MISIÓN con imagen lateral -->
    <div class="flex flex-col md:flex-row gap-8 items-center">
        <section class="py-5 px-4 sm:px-6 lg:px-8 overflow-hidden bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row items-center justify-between gap-12">

                    <!-- Imagen (ahora a la izquierda) -->
                    <div class="w-full md:w-1/2 relative order-2 md:order-1">
                        <div class="relative group">
                            <div class="relative bg-white rounded-xl p-2 shadow-sm">
                                <div class="relative overflow-hidden rounded-xl aspect-video">
                                    <img src="{{ asset('img/p8.jpg') }}" alt="Producción de lácteos de alta calidad"
                                        class="w-full h-full object-cover object-center transition-all duration-500 transform group-hover:scale-110">

                                    @include('layouts.partials.app.wave-buttom')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido de Texto (ahora a la derecha) -->
                    <div class="w-full md:w-1/2 space-y-6 order-1 md:order-2">
                        <div class="inline-block">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">NUESTRA
                                EMPRESA</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold">
                            <span class="text-blue-700">Misión</span>
                        </h2>
                        <div class="w-20 h-1 bg-blue-500 rounded-full"></div>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Proveer productos lácteos que sean reconocidos por su inocuidad y calidad para deleitar y
                            facilitar
                            la vida de clientes, consumidores y colaboradores, fundamentando nuestro compromiso con los
                            valores
                            que nos representan.
                        </p>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <!-- VALORES con imágenes integradas -->
    <div class="flex flex-col md:flex-row gap-8 items-center">
        <section class="py-5 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <div class="inline-block mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">NUESTROS
                            PRINCIPIOS</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold">
                        <span class="text-blue-700">Valores</span>
                    </h2>
                    <div class="w-20 h-1 bg-blue-500 rounded-full mx-auto mt-4"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Valor 1 -->
                    <div
                        class="bg-white rounded-xl shadow-sm group hover:shadow-md transition-all duration-300 overflow-hidden">
                        <div class="relative h-40 overflow-hidden">
                            <img src="{{ asset('img/p1.jpg') }}" alt="Servicio"
                                class="w-full h-full object-cover transition-all duration-700 transform group-hover:scale-110">

                            @include('layouts.partials.app.wave-buttom')
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-blue-700 mb-2">Servicio</h3>
                            <div class="w-12 h-1 bg-blue-500 rounded-full mb-4"></div>
                            <p class="text-gray-600">Orientados a satisfacer las necesidades de nuestros clientes con
                                dedicación y compromiso.</p>
                        </div>
                    </div>

                    <!-- Valor 2 -->
                    <div
                        class="bg-white rounded-xl shadow-sm group hover:shadow-md transition-all duration-300 overflow-hidden">
                        <div class="relative h-40 overflow-hidden">
                            <img src="{{ asset('img/p4.jpg') }}" alt="Trabajo"
                                class="w-full h-full object-cover transition-all duration-700 transform group-hover:scale-110">

                            @include('layouts.partials.app.wave-buttom')
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-blue-700 mb-2">Trabajo</h3>
                            <div class="w-12 h-1 bg-blue-500 rounded-full mb-4"></div>
                            <p class="text-gray-600">Esfuerzo constante y metódico para lograr la excelencia en nuestros
                                productos.</p>
                        </div>
                    </div>

                    <!-- Valor 3 -->
                    <div
                        class="bg-white rounded-xl shadow-sm group hover:shadow-md transition-all duration-300 overflow-hidden">
                        <div class="relative h-40 overflow-hidden">
                            <img src="{{ asset('img/p6.jpg') }}" alt="Perseverancia"
                                class="w-full h-full object-cover transition-all duration-700 transform group-hover:scale-110">

                            @include('layouts.partials.app.wave-buttom')
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-blue-700 mb-2">Perseverancia</h3>
                            <div class="w-12 h-1 bg-blue-500 rounded-full mb-4"></div>
                            <p class="text-gray-600">Constancia en la búsqueda de soluciones y mejora continua en todos
                                nuestros procesos.</p>
                        </div>
                    </div>

                    <!-- Valor 4 -->
                    <div
                        class="bg-white rounded-xl shadow-sm group hover:shadow-md transition-all duration-300 overflow-hidden">
                        <div class="relative h-40 overflow-hidden">
                            <img src="{{ asset('img/p5.jpg') }}" alt="Pasión"
                                class="w-full h-full object-cover transition-all duration-700 transform group-hover:scale-110">

                            @include('layouts.partials.app.wave-buttom')
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-blue-700 mb-2">Pasión</h3>
                            <div class="w-12 h-1 bg-blue-500 rounded-full mb-4"></div>
                            <p class="text-gray-600">Entusiasmo y dedicación en cada producto que elaboramos para
                                nuestros clientes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- POLÍTICA DE CALIDAD con imagen de fondo sutil -->
    <div>
        <section class="py-5 px-4 sm:px-6 lg:px-8 overflow-hidden bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-left mb-12">
                    <div class="inline-block mb-4">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">COMPROMISO</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold">
                        <span class="text-blue-700">Política de Calidad</span>
                    </h2>
                    <div class="w-20 h-1 bg-blue-500 rounded-full mt-4"></div>
                </div>

                <div class="flex flex-col md:flex-row gap-10">
                    <!-- Imagen lateral con efecto -->
                    <div class="w-full md:w-2/5 relative">
                        <div class="relative group h-full">
                            <div class="relative bg-white rounded-2xl p-2 h-full shadow-sm">
                                <div class="overflow-hidden rounded-xl h-full">
                                    <img src="{{ asset('img/p2.jpg') }}" alt="Control de calidad"
                                        class="w-full h-full object-cover object-center transition-all duration-500 transform group-hover:scale-110">

                                    @include('layouts.partials.app.wave-buttom')
                                    @include('layouts.partials.app.wave-top')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Texto con formato de puntos clave -->
                    <div class="w-full md:w-3/5">
                        <p class="text-lg text-gray-700 mb-8">
                            La Dirección General de Industria Lechera de San Juan del Río, S.A.P.I. de C.V. se
                            compromete a:
                        </p>

                        <div class="space-y-5">
                            <div
                                class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-blue-500">
                                <p class="text-gray-700">Garantizar el cumplimiento del Código SQF y los requisitos
                                    legales y reglamentarios sobre inocuidad alimentaria aplicables.</p>
                            </div>

                            <div
                                class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-blue-500">
                                <p class="text-gray-700">Elaborar y proveer productos inocuos, evitando riesgos de
                                    contaminación física, química y biológica.</p>
                            </div>

                            <div
                                class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-blue-500">
                                <p class="text-gray-700">Producir alimentos que cumplan con los estándares de calidad y
                                    las expectativas de los clientes.</p>
                            </div>

                            <div
                                class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-blue-500">
                                <p class="text-gray-700">Establecer, mantener y mejorar continuamente el Sistema de
                                    Gestión de Inocuidad Alimentaria de la empresa.</p>
                            </div>

                            <div
                                class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-blue-500">
                                <p class="text-gray-700">Desarrollar y mantener una cultura de inocuidad alimentaria en
                                    la organización.</p>
                            </div>

                            <div
                                class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-blue-500">
                                <p class="text-gray-700">Mantener una comunicación abierta y honesta con los clientes,
                                    proveedores y colaboradores.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


