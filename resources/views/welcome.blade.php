<x-app-layout>
    <style>
        body {
            background-color: #252a32;
            color: #f3f4f6;
        }

        .titulo {
            color: #F17324;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .coche {
            background-color: #252a32;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .coche:hover {
            transform: translateY(-5px);
        }

        .coche img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .coche-info {
            padding: 20px;
        }

        .precio {
            font-size: 20px;
            font-weight: bold;
            color: #F17324;
        }

        .estado {
            font-size: 14px;
            color: #f3f4f6;
            font-weight: bold;
            align-self: flex-end;
        }

        .button {
            margin: 0;
            height: auto;
            background: transparent;
            padding: 0;
            border: none;
            cursor: pointer;
            --border-right: 6px;
            --text-stroke-color: #F17324;
            --animation-color: #F17324;
            --fs-size: 2em;
            letter-spacing: 3px;
            text-decoration: none;
            font-size: var(--fs-size);
            font-family: "Arial";
            position: relative;
            text-transform: uppercase;
            color: transparent;
            -webkit-text-stroke: 1px var(--text-stroke-color);
        }

        .hover-text {
            position: absolute;
            box-sizing: border-box;
            content: attr(data-text);
            color: var(--animation-color);
            width: 0%;
            inset: 0;
            border-right: var(--border-right) solid var(--animation-color);
            overflow: hidden;
            transition: 0.5s;
            -webkit-text-stroke: 1px var(--animation-color);
        }

        .button:hover .hover-text {
            width: 100%;
            filter: drop-shadow(0 0 23px var(--animation-color));
        }

        /* Carousel */
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .h-56 {
            height: 14rem;
        }

        .md\:h-96 {
            height: 24rem;
        }

        .swiper-button-prev,
        .swiper-button-next {
            color: white;
        }

        :hover.swiper-button-prev,
        :hover.swiper-button-next {
            color: #F17324;
        }

        .swiper-pagination-bullet {
            background: white;
        }

        .swiper-pagination-bullet-active {
            background: #F17324;
        }

        /* Loader */
        .loader {
            position: relative;
            width: 108px;
            display: flex;
            justify-content: space-between;
        }

        .loader::after,
        .loader::before {
            content: "";
            display: inline-block;
            width: 48px;
            height: 48px;
            background-color: #fff;
            background-image: radial-gradient(circle 14px, #0d161b 100%, transparent 0);
            background-repeat: no-repeat;
            border-radius: 50%;
            animation: eyeMove 10s infinite, blink 10s infinite;
        }

        @keyframes eyeMove {

            0%,
            10% {
                background-position: 0px 0px;
            }

            13%,
            40% {
                background-position: -15px 0px;
            }

            43%,
            70% {
                background-position: 15px 0px;
            }

            73%,
            90% {
                background-position: 0px 15px;
            }

            93%,
            100% {
                background-position: 0px 0px;
            }
        }

        @keyframes blink {

            0%,
            10%,
            12%,
            20%,
            22%,
            40%,
            42%,
            60%,
            62%,
            70%,
            72%,
            90%,
            92%,
            98%,
            100% {
                height: 48px;
            }

            11%,
            21%,
            41%,
            61%,
            71%,
            91%,
            99% {
                height: 18px;
            }
        }

        footer a {
            transition: color 0.4s ease;
        }

        footer a:hover {
            color: #F17324;
        }

        footer .fab {
            font-size: 1.5rem;
        }
    </style>


    {{-- <div class="w-3/4 mt-12 mx-auto mb-9">
        <div class="swiper-container relative w-full">
            <div class="swiper-wrapper relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="swiper-slide">
                    <img src="{{ Storage::url('imagenes/carrousel4.png') }}" class="block w-full h-full object-cover">
                </div>
                <!-- Item 2 -->
                <div class="swiper-slide">
                    <a href="{{ route('coches.index') }}">
                        <img src="{{ Storage::url('imagenes/carrousel2.png') }}" class="block w-full h-full object-cover">
                    </a>

                </div>
                <!-- Item 3 -->
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/turbomotors_tfg/" target="blank">
                        <img src="{{ Storage::url('imagenes/carrousel5.png') }}"
                            class="block w-full h-full object-cover">
                    </a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: 'fade', // También puedes probar con 'fade' o 'cube' si prefieres
                speed: 600,
            });
        });
    </script> --}}

    {{-- BUSCADOR CON GIF --}}

    <div class="w-3/5 mb-10 h-1/6 mx-auto relative my-8 bg-cover bg-center p-4 bg-white rounded-xl overflow-hidden">
        <img src="{{ Storage::url('imagenes/cocheGif.gif') }}" class="rounded-xl w-full h-full object-cover z-0">
        <div
            class="absolute inset-0 flex flex-col justify-center items-center text-white z-10 bg-gray-800 bg-opacity-70 rounded-xl">
            <h1 class="text-5xl font-bold mb-3">TURBO MOTORS</h1>
            <h2 class="text-2xl mb-10 text-orange-500 font-semibold">Venta y consignación de los mejores coches del
                mercado
            </h2>
            <div class="flex">
                <form action="{{ route('coches.index') }}" method="GET">
                    <input type="text" name="buscar" placeholder="Busca por marca, modelo o tipo..."
                        class="p-3 rounded-l-lg w-80 text-black">
                    <button type="submit" class="bg-orange-600 p-3 rounded-r-lg text-white">
                        <i class="fas fa-search mr-2"></i>Buscar Coche</button>
                </form>
            </div>
        </div>
        {{-- <!-- MARCO LATERAL -->
        <div class="absolute top-0 left-0 w-5 h-full bg-orange-600 z-20"></div>
        <div class="absolute top-0 right-0 w-5 h-full bg-orange-600 z-20"></div>
        <!-- MARCO SUPERIOR Y INFERIOR -->
        <div class="absolute top-0 left-0 w-full h-5 bg-orange-600 z-20"></div>
        <div class="absolute bottom-0 left-0 w-full h-5 bg-orange-600 z-20"></div> --}}
    </div>


    {{-- COCHES RECOMENDADOS --}}

    <div class="m-3">
        <div class="flex justify-center mt-4">
            <h1 class="titulo text-4xl font-semibold">COCHES QUE DEBERÍAS VER</h1>
            <span class="mx-5 mt-4 loader"></span>
        </div>

        <div class="flex justify-center">
            <div class="w-5/6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($listaCoches as $coche)
                    <a href="{{ route('compra.coche', $coche->id) }}">
                        <div class="coche bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                            <p
                                class="mt-2 ml-2 estado absolute top-0 left-0 text-white px-2 py-1 rounded {{ $coche->nuevo == 'SI' ? 'bg-orange-600' : 'bg-gray-900' }}">
                                {{ $coche->nuevo == 'SI' ? '¡ NUEVO !' : $coche->kilometros . ' km' }}
                            </p>
                            <img src="{{ Storage::url($coche->imagen) }}" alt="Imagen de Coche" class="w-full">
                            <div class="coche-info p-4">
                                <h3 class="text-xl font-bold mb-2">{{ $coche->marca->nombre }}</h3>
                                <h4 class="mb-2">{{ $coche->marca->modelo }}</h4>
                                <div class="flex justify-between">
                                    <p class="tipo">{{ $coche->fabricacion }}</p>
                                    <p class="precio">{{ $coche->precio }} €</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- BOTÓN VER MÁS COCHES --}}

        <div class="w-full h-40 flex items-center justify-center cursor-pointer mt-4">
            <a href="{{ route('coches.index') }}">
                <div
                    class="relative inline-flex items-center justify-start py-4 pl-6 pr-14 overflow-hidden font-semibold shadow transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-8 bg-gray-700 text-white dark:hover:text-gray-200 dark:shadow-none group">
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-orange-600 group-hover:h-full"></span>
                    <span class="absolute right-0 pr-6 duration-200 ease-out group-hover:translate-x-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            class="w-6 h-6 text-white-400">
                            <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="2" stroke-linejoin="round"
                                stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <span class="absolute left-0 pl-3 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            class="w-6 h-6 text-white-400">
                            <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="2" stroke-linejoin="round"
                                stroke-linecap="round"></path>
                        </svg>
                    </span>
                    <span
                        class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white dark:group-hover:text-gray-200">
                        VER MÁS
                    </span>
                </div>
        </div>
        </a>
    </div>

    {{-- PRESENTACION Y ENLACE A CONTACTO --}}

    <div
        class="mx-auto w-3/4 block rounded-lg bg-gray-800 px-6 py-12 shadow-md flex flex-col items-center md:items-start">
        <div class="w-full md:flex md:items-start">
            <div class="w-full md:w-1/2 mt-8 md:mt-0 md:pr-6">
                <h2 class="text-3xl font-bold mb-4 text-orange-600">CONTÁCTANOS</h2>
                <p class="text-white text-lg mb-8">
                    Durante estos años, hemos sido testigos de innumerables sonrisas en los rostros de nuestros clientes
                    cuando encuentran el vehículo perfecto.
                    Nuestra historia está entrelazada con la tuya: desde el primer coche que vendimos hasta las familias
                    que hemos visto crecer a lo largo de los años.
                    <br><br>
                    Nuestro equipo está formado por expertos con años de trayectoria en la industria automotriz,
                    comprometidos con la transparencia, la honestidad y la satisfacción del cliente. Nos encontramos en
                    una ubicación accesible y conveniente en la ciudad de Amería.
                    <br><br>
                    ¡Te invitamos a visitarnos y descubrir tu próximo coche con nosotros!
                </p>
            </div>
            <div class="w-full md:w-1/2 flex justify-center items-center ">
                <img src="{{ Storage::url('imagenes/conocenos.png') }}" class="rounded-xl max-w-full h-auto">
            </div>
        </div>
        <div class="mt-12 flex justify-center w-full">
            <a href="{{ route('contacto.index') }}">
                <button
                    class="w-40 h-12 bg-white cursor-pointer rounded-3xl border-2 border-[#F17326] shadow-[inset_0px_-2px_0px_1px_#F17326] group hover:bg-[#F17326] transition duration-300 ease-in-out">
                    <span class="font-medium text-black group-hover:text-white">CONTÁCTANOS</span>
                </button>
            </a>
        </div>
    </div>


    {{-- FOOTER --}}

    <footer class="mt-32 bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">

            <div class="mb-6 md:mb-0">
                <a href="{{ route('home') }}">
                    <div class="mt-16">
                        <button class="button" data-text="Awesome">
                            <span class="actual-text">&nbsp;TurboMotors&nbsp;</span>
                            <span aria-hidden="true" class="hover-text">&nbsp;TurboMotors&nbsp;</span>
                        </button>
                    </div>
                </a>
                <p class="mt-3 ml-10 text-gray-400">Tu próximo viaje empieza aquí</p>
            </div>

            <div class="flex flex-wrap mr-52 text-lg justify-center md:justify-start">
                <a href="{{ route('home') }}" class="text-gray-200 hover:text-orange-600 mx-3 mb-2 md:mb-0">Inicio</a>
                <a href="{{ route('coches.index') }}"
                    class="text-gray-200 hover:text-orange-600 mx-3 mb-2 md:mb-0">Inventario</a>
                <a href="{{ route('contacto.index') }}"
                    class="text-gray-200 hover:text-orange-600 mx-3 mb-2 md:mb-0">Contacto</a>
                <a href="{{ route('deseos.index') }}"
                    class="text-gray-200 hover:text-orange-600 mx-3 mb-2 md:mb-0">Deseos</a>
                <a href="{{ route('vendidos.index') }}"
                    class="text-gray-200 hover:text-orange-600 mx-3 mb-2 md:mb-0">Compras</a>
            </div>

            <div class="flex justify-center md:justify-start mt-6 md:mt-0">
                <a href="https://www.instagram.com/turbomotors_tfg/" target="_blank"
                    class="text-gray-200 hover:text-orange-600 text-lg mx-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://github.com/YasinRF/TurboMotors" target="_blank"
                    class="text-gray-200 hover:text-orange-600 text-lg mx-2">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://es.linkedin.com/in/yasin-rehla-1a73782a9" target="_blank"
                    class="text-gray-200 hover:text-orange-600 text-lg mx-3">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
        <div class="container mx-auto px-4 mt-8 text-center">
            <div class="flex justify-center items-center mt-20">
                <img src="{{ Storage::url('imagenes/Logo-sinFondo.png') }}" class="w-24">
                <p class="text-orange-400 text-sm ml-4">&copy; 2024 TurboMotors. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

</x-app-layout>
