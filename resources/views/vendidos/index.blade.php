<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-white">
            MIS COCHES
        </h2>
    </x-slot>

    <div class="w-4/5 m-auto">
        @if (count($vendidos))
            <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-lg text-white uppercase bg-orange-500">
                        <tr>
                            <th scope="col" class="px-16 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Marca
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Modelo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendidos as $venta)
                            <tr class="bg-gray-800 border-gray-700 hover:bg-gray-700">
                                <td class="p-4 relative">
                                    <img src="{{ Storage::url($venta->coche->imagen) }}"
                                        class="w-16 md:w-52 max-w-full max-h-full">

                                    <div class="absolute bottom-0 left-0">
                                        <img src="{{ Storage::url('imagenes/vendido.png') }}"
                                            class="w-15 h-24 m-2 mb-6 ml-6">
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-2xl font-semibold text-white">
                                    {{ $venta->coche->marca->nombre }}
                                </td>
                                <td class="px-6 py-4 text-2xl font-semibold text-white">
                                    {{ $venta->coche->marca->modelo }}
                                </td>
                                <td class="px-6 py-4 text-2xl font-semibold text-orange-500">
                                    {{ $venta->coche->precio }} €
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('vendidos.factura', $venta->coche->id) }}" target="blank_">
                                        <button
                                            class="cursor-pointer flex justify-between bg-red-700 px-3 py-2 rounded-full text-white tracking-wider shadow-xl hover:bg-white hover:text-red-700 hover:scale-105 duration-500 hover:ring-1 font-mono w-[150px]">
                                            FACTURA
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-5 h-5 animate-bounce">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"></path>
                                            </svg>
                                        </button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $vendidos->links() }}
                </div>
            </div>
        @else
            {{-- MENSAJE POR SI NO TIENES COCHES COMPRADOS --}}
            <div class="mt-4 text-center">
                <img src="{{ Storage::url('imagenes/noVendidos.png') }}" class="mx-auto w-1/4 mt-4">
                <h1 class="font-bold text-orange-600 text-xl">NO TIENES COCHES COMPRADOS</h1>
                <p class="text-white">Accede al inventario y compra ya tu coche soñado</p>
            </div>
        @endif
    </div>


</x-app-layout>
