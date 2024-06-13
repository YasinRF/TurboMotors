<x-principal>
    <div class="mb-8 text-center">
        <h1 class="text-orange-600 text-3xl">INVENTARIO DE COCHES</h1>
    </div>

    {{-- FILTRO POR TIPO --}}
    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
        <button type="button"
            class="mr-20 text-orange-500 hover:text-white border border-orange-500 bg-gray-900 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-500 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-orange-500 dark:text-orange-500 dark:hover:text-white dark:hover:bg-orange-400 dark:focus:ring-orange-400"
            wire:click="filtrarPorTipo(null)">Todos los tipos</button>
        @foreach ($tipos as $tipo)
            <button type="button"
                class="text-white border border-orange-500 bg-gray-900 hover:border-white focus:ring-4 focus:outline-none focus:ring-orange-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:focus:ring-orange-400"
                wire:click="filtrarPorTipo('{{ $tipo->nombre }}')">
                {{ $tipo->nombre }}
            </button>
        @endforeach
    </div>

    <div class="flex">
        <aside class="bg-gray-800 rounded-lg sticky top-6 h-full sidebar w-1/5 mt-20 mr-3 text-white p-4">
            <h1 class="text-2xl mb-8 text-orange-600">
                FILTRAR POR:
            </h1>

            {{-- FILTRO POR MARCA --}}
            <h2 class="sidebar-title text-xl mb-4 cursor-pointer" onclick="toggleMarcaList()">MARCA
                <i class="fas fa-angle-down mx-1"></i>
            </h2>
            <ul id="marca-list" class="mb-4 marca-list hidden text-sm grid grid-cols-2 gap-4">
                @foreach ($marcas->unique('nombre') as $marca)
                    <a href="#" wire:click.prevent="filtrarPorMarca('{{ $marca->nombre }}')">
                        <li class="mb-1 bg-white rounded-md text-black font-bold text-center">
                            {{ $marca->nombre }}
                        </li>
                    </a>
                @endforeach
            </ul>

            {{-- FILTRO POR NUEVO --}}
            <h2 class="sidebar-title text-xl mb-4 cursor-pointer" onclick="toggleNuevoList()">ESTADO
                <i class="fas fa-angle-down mx-1"></i>
            </h2>
            <ul id="nuevo-list" class="nuevo-list hidden text-sm">
                <a href="#" wire:click.prevent="filtrarPorNuevo('SI')">
                    <li class="mb-2 bg-white rounded-md text-black font-bold text-center">
                        Nuevo
                    </li>
                </a>
                <a href="#" wire:click.prevent="filtrarPorNuevo('NO')">
                    <li class="mb-4 bg-white rounded-md text-black font-bold text-center">
                        Semi-nuevo
                    </li>
                </a>
            </ul>

            {{-- FILTRO POR COLOR --}}
            <h2 class="sidebar-title text-xl mb-4 cursor-pointer" onclick="toggleColorList()">COLOR
                <i class="fas fa-angle-down mx-1"></i>
            </h2>
            <ul id="color-list" class="mb-4 color-list hidden">
                @foreach ($colores as $color)
                    <a href="#" wire:click.prevent="filtrarPorColor('{{ $color }}')">
                        <li class="mb-2 bg-white rounded-md text-black font-bold text-center">
                            {{ $color }}
                        </li>
                    </a>
                @endforeach
            </ul>

            {{-- FILTRO POR AÑO --}}
            <h2 class="sidebar-title text-xl mb-4 cursor-pointer" onclick="toggleFabricacionList()">AÑO
                <i class="fas fa-angle-down mx-1"></i>
            </h2>
            <ul id="fabricacion-list" class="mb-4 fabricacion-list hidden text-sm grid grid-cols-2">
                @foreach ($anioFabricacion as $fabricacion)
                    <a href="#" wire:click.prevent="filtrarPorFabricacion('{{ $fabricacion }}')">
                        <li class="m-1 bg-white rounded-md text-black font-bold text-center">
                            {{ $fabricacion }}
                        </li>
                    </a>
                @endforeach
            </ul>

            {{-- FILTRO POR PRECIO --}}
            <h2 class="sidebar-title text-xl mb-4 cursor-pointer" onclick="togglePrecioList()">PRECIO
                <i class="fas fa-angle-down mx-1"></i>
            </h2>
            <ul id="precio-list" class="precio-list hidden text-sm">
                <a href="#" wire:click.prevent="filtrarPorPrecio('0-5000')">
                    <li class="mb-2 bg-white rounded-md text-black font-bold text-center">
                        0€ - 5.000€
                    </li>
                </a>
                <a href="#" wire:click.prevent="filtrarPorPrecio('5000-10000')">
                    <li class="mb-2 bg-white rounded-md text-black font-bold text-center">
                        5.000€ - 10.000€
                    </li>
                </a>
                <a href="#" wire:click.prevent="filtrarPorPrecio('10000-20000')">
                    <li class="mb-2 bg-white rounded-md text-black font-bold text-center">
                        10.000€ - 20.000€
                    </li>
                </a>
                <a href="#" wire:click.prevent="filtrarPorPrecio('20000-50000')">
                    <li class="mb-2 bg-white rounded-md text-black font-bold text-center">
                        20.000€ - 50.000€
                    </li>
                </a>
                <a href="#" wire:click.prevent="filtrarPorPrecio('50000-100000')">
                    <li class="mb-2 bg-white rounded-md text-black font-bold text-center">
                        <a href="#" wire:click.prevent="filtrarPorPrecio('50000-100000')"> > 50.000€
                    </li>
                </a>
            </ul>

            <div class="mt-14 ml-4">
                <a href="{{ route('coches.index') }}">
                    <button
                        class="bg-gray-950 border-2 border-[#3e3e3e] rounded-lg text-white px-6 py-3 text-base hover:border-[#EF7325] cursor-pointer transition">
                        Borrar Filtros
                    </button>
                </a>
            </div>

            <script>
                //CÓDIGO JAVASCRIPT, LO QUE HACE ES MOSTRAR Y OCULTAR LAS OPCIONES DE CADA ATRIBUTO EN EL FILTRO

                function toggleMarcaList() {
                    var listaMarca = document.getElementById("marca-list");
                    listaMarca.classList.toggle("hidden");
                }

                function toggleNuevoList() {
                    var listaNuevo = document.getElementById("nuevo-list");
                    listaNuevo.classList.toggle("hidden");
                }

                function toggleColorList() {
                    var listaColor = document.getElementById("color-list");
                    listaColor.classList.toggle("hidden");
                }

                function toggleFabricacionList() {
                    var listaFabricacion = document.getElementById("fabricacion-list");
                    listaFabricacion.classList.toggle("hidden");
                }

                function togglePrecioList() {
                    var listaPrecio = document.getElementById("precio-list");
                    listaPrecio.classList.toggle("hidden");
                }
            </script>
        </aside>


        <div class="w-full p-4">
            {{-- BUSCAR COCHES --}}
            <div class="flex justify-end mb-5">
                {{-- <x-input wire:model.live="buscar" placeholder="Busca tu coche aquí..."
                    class="w-1/2 text-orange-500 bg-orange-600 border border-gray-600 px-4 py-2 focus:ring-2 focus:ring-orange-400"></x-input> --}}
                <input wire:model.live="buscar"
                    class="w-1/3 bg-gray-800 text-white focus:ring-2 focus:ring-orange-400 outline-none duration-300 placeholder:text-white placeholder:opacity-50 rounded-full px-4 py-1 mb-1"
                    placeholder="Buscar...">
                </input>

                <button type="button" class="ml-2 bg-orange-600 text-gray-800 px-4 py-2 mb-1 rounded">
                    <i class="fas fa-search"></i>
                </button>
            </div>


            {{-- LISTA COCHES --}}
            @if (count($coches))
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($coches as $item)
                        <a href="{{ route('compra.coche', $item->id) }}">
                            <div
                                class="bg-gray-800 rounded-lg overflow-hidden shadow-md coche transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg text-white relative">
                                <p
                                    class="mt-2 ml-2 estado absolute top-0 left-0 text-white px-2 py-1 rounded {{ $item->nuevo == 'SI' ? 'bg-orange-600' : 'bg-gray-900' }}">
                                    {{ $item->nuevo == 'SI' ? '¡ NUEVO !' : $item->kilometros . ' km' }}
                                </p>
                                <img class="w-full h-64 object-cover" src="{{ Storage::url($item->imagen) }}"
                                    alt="Imagen de Coche">
                                <div class="absolute bottom-0 left-0">
                                    <img src="{{ Storage::url('imagenes/logo-sinFondo.png') }}"
                                        class="w-15 mb-36 h-20 m-2">
                                </div>
                                <div class="p-4 coche-info">
                                    <h3 class="text-xl font-bold mb-2">{{ $item->marca->nombre }}</h3>
                                    <h4 class="mb-2">{{ $item->marca->modelo }}</h4>
                                    <p class="text-sm text-gray-300 mt-2 font-bold estado">
                                        {{ $item->fabricacion }}</p>
                                    <p class="text-orange-600 text-end font-semibold text-xl precio">
                                        {{ $item->precio }} €
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $coches->links() }}
                </div>
            @else
                {{-- MENSAJE POR SI NO ENCUENTRA COCHES --}}
                <div class="mt-4 text-center">
                    <img src="{{ Storage::url('imagenes/coche_no_encontrado.png') }}" class="mx-auto mt-4">
                    <h1 class="font-bold text-orange-600 text-xl">No hemos encontrado resultados</h1>
                    <p class="text-white">Cambia tu búsqueda o modifica alguno de los filtros cuando no encuentres tu
                        coche</p>
                </div>
            @endif
        </div>
    </div>
</x-principal>
