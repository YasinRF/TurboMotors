<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-white">
            DESEADOS
        </h2>
    </x-slot>

    <div class="w-4/5 m-auto">
        @if (count($deseos))
            <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-lg text-white uppercase bg-orange-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Marca
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Modelo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Año
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
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
                        @foreach ($deseos as $deseo)
                            @if ($deseo->coche)
                                <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-700">
                                    <td class="p-4 relative">

                                        <img src="{{ Storage::url($deseo->coche->imagen) }}"
                                            class="w-16 md:w-52 max-w-full max-h-full">

                                        <div class="absolute bottom-0 left-0">
                                            <img src="{{ Storage::url('imagenes/favoritos.png') }}"
                                                class="w-15 h-14 m-2 mb-4">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-lg font-semibold text-white">
                                        {{ $deseo->coche->marca->nombre }}
                                    </td>
                                    <td class="px-6 py-4 text-lg font-semibold text-white">
                                        {{ $deseo->coche->marca->modelo }}
                                    </td>
                                    <td class="px-6 py-4 text-lg font-semibold text-white">
                                        {{ $deseo->coche->fabricacion }}
                                    </td>
                                    <td class="px-6 py-4 text-lg font-semibold text-white">
                                        {{ $deseo->coche->color }}
                                    </td>
                                    <td class="px-6 py-4 text-lg font-semibold text-white">
                                        {{ $deseo->coche->nuevo == 'SI' ? 'Nuevo' : $deseo->coche->kilometros . ' KM' }}
                                    </td>
                                    <td class="px-6 py-4 text-xl font-semibold text-orange-500">
                                        {{ $deseo->coche->precio }} €
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('compra.coche', $deseo->coche->id) }}" alt="Ver coche"
                                            class="mx-3 text-2xl font-medium text-blue-600 hover:text-blue-500"><i
                                                class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('deseos.destroy', $deseo) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="mx-3 text-2xl font-medium text-red-600 hover:text-red-500"><i
                                                    class="fas fa-heart-circle-minus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        {{-- MENSAJE POR SI NO TIENES DESEOS --}}
                        <div class="mt-4 text-center">
                            <img src="{{ Storage::url('imagenes/noDeseos.png') }}" class="mx-auto w-1/4 mt-4">
                            <h1 class="font-bold text-orange-600 text-xl">NO TIENES COCHES FAVORITOS POR EL MOMENTO
                            </h1>
                            <p class="text-white">Accede al inventario y pide tu deseo ahora</p>
                        </div>
        @endif
        </tbody>
        </table>
        <div class="mt-4">
            {{ $deseos->links() }}
        </div>
    </div>
</x-app-layout>
