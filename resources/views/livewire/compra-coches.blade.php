<x-principal>
    <style>
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .container {
            display: block;
            position: relative;
            cursor: pointer;
            user-select: none;
        }

        .container svg {
            position: relative;
            top: 0;
            left: 0;
            height: 40px;
            width: 40px;
            transition: all 0.3s;
            fill: #666;
        }

        .container svg:hover {
            transform: scale(1.2);
        }

        .container input:checked~svg {
            fill: #F17324;
        }

        .CartBtn {
            width: 140px;
            height: 40px;
            border-radius: 12px;
            border: none;
            background-color: #F17324;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition-duration: .5s;
            overflow: hidden;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.103);
            position: relative;
        }

        .IconContainer {
            position: absolute;
            left: -50px;
            width: 30px;
            height: 30px;
            background-color: transparent;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            z-index: 2;
            transition-duration: .5s;
        }

        .icon {
            border-radius: 1px;
        }

        .text {
            height: 100%;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            z-index: 1;
            transition-duration: .5s;
            font-size: 1.04em;
            font-weight: 600;
        }

        .CartBtn:hover .IconContainer {
            transform: translateX(58px);
            border-radius: 40px;
            transition-duration: .5s;
        }

        .CartBtn:hover .text {
            transform: translate(10px, 0px);
            transition-duration: .5s;
        }

        .CartBtn:active {
            transform: scale(0.95);
            transition-duration: .5s;
        }
    </style>
    <div><a href="{{ route('coches.index') }}"><button class="text-white text-2xl"><i
                    class="fas fa-arrow-left"></i></button></a>

    </div>
    <div class="flex items-center justify-center">
        {{-- IMAGEN DEL COCHE --}}
        <div class="w-3/4 m-6 relative">
            <img src="{{ Storage::url($coche->imagen) }}" class="w-full rounded-lg shadow-md">

            <div class="absolute bottom-0 left-0">
                <img src="{{ Storage::url('imagenes/logo-sinFondo.png') }}" class="w-15 h-40 mt-6">
            </div>
        </div>



        {{-- CARACTERÍSTICAS DEL COCHE --}}
        <div class="w-1/2">
            <div class="ml-5 flex items-center">
                <h1 class="text-3xl font-bold mb-1 text-white text-decoration-line: underline">
                    {{ $coche->marca->nombre }}
                    {{ $coche->marca->modelo }}
                </h1>

                {{-- DESEO COCHE --}}
                <div class="ml-auto">
                    <form action="{{ route('deseos.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="coche_id" value="{{ $coche->id }}">
                        <div class="bg-white rounded-full w-15 px-3 py-3">
                            <label class="container">
                                <input type="checkbox" {{ $liked ? 'checked' : '' }} onclick="this.form.submit()">
                                <svg id="Layer_1" version="1.0" viewBox="0 0 23 24" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path
                                        d="M16.4,4C14.6,4,13,4.9,12,6.3C11,4.9,9.4,4,7.6,4C4.5,4,2,6.5,2,9.6C2,14,12,22,12,22s10-8,10-12.4C22,6.5,19.5,4,16.4,4z">
                                    </path>
                                </svg>
                            </label>
                        </div>
                    </form>
                </div>
            </div>

            <div class="m-4 px-8 bg-gray-800 m-4 rounded-lg">
                <div class="mb-6">
                    <dl
                        class="mb-4 max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col mb-3">
                            <dt class="mt-2 mb-1 text-gray-400 md:text-lg">Año:</dt>
                            <dd class="text-lg text-white font-semibold">{{ $coche->fabricacion }}</dd>
                        </div>
                        <div class="flex flex-col mb-3">
                            <dt class="mb-1 text-gray-400 md:text-lg">Estado:</dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $coche->nuevo == 'SI' ? 'Nuevo' : $coche->kilometros . ' KM' }}</dd>
                        </div>
                        <div class="flex flex-col mb-3">
                            <dt class="mb-1 text-gray-400 md:text-lg">Color:</dt>
                            <dd class="text-lg text-white font-semibold">{{ $coche->color }}</dd>
                        </div>
                        <div class="flex flex-col mb-12">
                            <dt class="mb-1 text-gray-400 md:text-lg">Tipo:</dt>
                            <dd class="text-lg text-white font-semibold">{{ $tipo->nombre }}</dd>
                        </div>
                        <div class="flex flex-col mb-3">
                            <dt class="mb-1 text-gray-400 md:text-lg">Precio:</dt>
                            <dd class="text-2xl text-orange-600 font-semibold">{{ $coche->precio }} €</dd>
                        </div>
                    </dl>

                    {{-- COMPRAR COCHE --}}
                    <div class="mt-6 text-center">
                        <button wire:click="openCompra({{ $coche->id }})"
                            class="bg-orange-600 text-white px-8 py-3 rounded-lg hover:bg-orange-500 mb-6">
                            <i class="fas fa-cart-shopping mr-2"></i>
                            SOLICITAR COMPRA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DESCRIPCION DEL COCHE --}}
    <div class="my-12">
        <h1 class="text-2xl italic mb-1 text-white">{{ $coche->descripcion }}</h1>
    </div>

    {{-- COCHES SIMILARES --}}
    <div class="mt-10">
        <div class="mb-8 text-center">
            <h1 class="text-orange-500 text-2xl">COCHES SIMILARES</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($listaCoches as $coche)
                <a href="{{ route('compra.coche', $coche->id) }}">
                    <div
                        class="bg-gray-800 rounded-lg overflow-hidden shadow-md coche transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg text-white">
                        <img src="{{ Storage::url($coche->imagen) }}" alt="Imagen de Coche">
                        <div class="coche-info m-3">
                            <h3 class="text-xl font-bold mb-2">{{ $coche->marca->nombre }}</h3>
                            <h4 class="mb-2">{{ $coche->marca->modelo }}</h4>
                            <div class="flex justify-between">
                                <p class="estado">
                                    {{ $coche->nuevo == 'SI' ? '¡ NUEVO !' : $coche->kilometros . ' KM' }}
                                </p>
                                <p class="precio text-orange-600">{{ $coche->precio }} €</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- <div class="mt-6">
            {{ $listaCoches->links() }}
        </div> --}}
    </div>

    <!---------------------- MODAL COMPRA --------------------->
    @if ($coche)
        <x-dialog-modal wire:model="openModalCompra">

            <x-slot name="title" class="text-2xl text-orange-600">
                COMPRAR COCHE
            </x-slot>

            <x-slot name="content">
                <div class="flex flex-col gap-2 p-8">
                    <label for="input" class="block text-sm font-extrabold text-white">NOMBRE Y APELLIDOS<span
                            class="text-2xl text-orange-500"> *</span></label>
                    <input placeholder="Nombre completo..." type="text" value="{{ auth()->user()->name }}"
                        wire:model="nombre"
                        class="w-full text-black rounded-lg border border-gray-300 bg-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100">
                    <x-input-error for="nombre" />

                    <label for="input" class="block mt-3 text-sm font-extrabold text-white">TELÉFONO<span
                            class="text-2xl text-orange-500"> *</span></label>
                    <input placeholder="Número de teléfono..." type="number" wire:model="telefono"
                        class="w-full text-black rounded-lg border border-gray-300 bg-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100">
                    <x-input-error for="telefono" />

                    <label for="input" class="block mt-3 text-sm font-extrabold text-white">EMAIL<span
                            class="text-2xl text-orange-500"> *</span></label>
                    <input placeholder="Email válido..." type="email" wire:model="email"
                        class="w-full text-black rounded-lg border border-gray-300 bg-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100">
                    <x-input-error for="email" />

                    <label for="input" class="block mt-3 text-sm font-extrabold text-white">COMENTARIO</label>
                    <textarea placeholder="Tu comentario..." rows="5"
                        class="w-full text-black rounded-lg border border-gray-300 bg-white px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-100"></textarea>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex flex-col p-8">
                    <label class="mt-8 mb-2 flex cursor-pointer items-center justify-between p-1 text-gray-300">
                        Aceptar términos de uso
                        <div class="relative inline-block">
                            <input type="checkbox"
                                class="peer h-6 w-12 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white checked:border-gray-900 checked:bg-orange-600 checked:text-orange-600 checked:bg-orange-600 hover:orange-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-900 focus-visible:ring-offset-2">
                            <span
                                class="pointer-events-none absolute left-1 top-1 block h-4 w-4 rounded-full bg-gray-400 transition-all duration-200 peer-checked:left-7 peer-checked:bg-gray-900"></span>
                        </div>
                    </label>
                    <button wire:click="store()"
                        class="bg-orange-600 text-xl text-white py-3 rounded-lg hover:bg-orange-500 mb-6">
                        SOLICITAR COMPRA <i class="fas fa-cart-shopping mr-2"></i>
                    </button>
                </div>
            </x-slot>

        </x-dialog-modal>
    @endif


</x-principal>
