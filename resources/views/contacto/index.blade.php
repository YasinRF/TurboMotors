<x-app-layout>

    <style>
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
    </style>

    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-white">
            CONTACTO
        </h2>
    </x-slot>

    <div class="container mx-auto md:px-6">
        <!-- Sección de Encabezado -->
        <section class="mb-32">
            <div class="relative h-[300px] overflow-hidden bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ asset('storage/imagenes/contacto.png') }}')">
            </div>

            <div class="container px-6 md:px-12">
                <div
                    class="block rounded-lg bg-gray-800 px-6 py-12 shadow-md shadow-black/20 md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px]">
                    <div class="mb-12 grid gap-x-6 md:grid-cols-2 lg:grid-cols-4 text-center text-orange-600">
                        <div class="mx-auto mb-12 lg:mb-0">
                            <i class="fas fa-globe text-4xl m-2"></i>
                            <h6 class="font-medium">ESPAÑA</h6>
                        </div>
                        <div class="mx-auto mb-12 lg:mb-0">
                            <i class="fas fa-map-pin text-4xl m-2"></i>
                            <h6 class="font-medium">ALMERÍA</h6>
                        </div>
                        <div class="mx-auto mb-6 md:mb-0">
                            <i class="fas fa-phone text-4xl m-2"></i>
                            <h6 class="font-medium">+34 617889628</h6>
                        </div>
                        <div class="mx-auto">
                            <i class="fas fa-envelope text-4xl m-2"></i>
                            <h6 class="font-medium">yasinrehla@gmail.com</h6>
                        </div>
                    </div>
                    <div class="mx-auto max-w-[700px]">
                        <form method="POST" action="{{ route('contacto.procesar') }}">
                            @csrf
                            {{-- NOMBRE --}}
                            <div class="mb-6">
                                <input
                                    class="rounded-lg shadow-2xl p-3 w-full outline-none text-white bg-slate-800 focus:border-orange-600 border-orange-500 placeholder-white"
                                    type="text" placeholder="Nombre y Apellidos..." id="nombre" name="nombre">
                                <x-input-error for="nombre" class="italic mt-1" />
                            </div>

                            {{-- EMAIL --}}
                            @auth
                                <div class="mb-6">
                                    <input value="{{ auth()->user()->email }}" readonly
                                        class="rounded-lg shadow-2xl p-3 w-full outline-none text-white bg-slate-800 focus:border-orange-600 border-orange-500 placeholder-white"
                                        type="email" placeholder="Email..." id="email" name="email">
                                </div>
                            @else
                                <div class="mb-6">
                                    <input
                                        class="rounded-lg shadow-2xl p-3 w-full outline-none text-white bg-slate-800 focus:border-orange-600 border-orange-500 placeholder-white"
                                        type="email" placeholder="Email..." id="email" name="email">
                                </div>
                            @endauth
                            <x-input-error for="email" class="italic mt-1" />

                            {{-- MENSAJE --}}
                            <div class="mb-6">
                                <textarea
                                    class="rounded-lg shadow-2xl p-3 w-full outline-none text-white bg-slate-800 focus:border-orange-600 border-orange-500 placeholder-white"
                                    name="mensaje" id="mensaje" rows="5" placeholder="Tu mensaje..."></textarea>
                                <x-input-error for="mensaje" class="italic mt-1" />
                            </div>


                            {{-- BOTON ENVIAR --}}
                            <div class="text-center">
                                <button type="submit"
                                    class="relative py-3 px-20 text-black text-lg font-bold rounded-full overflow-hidden bg-white transition-all duration-400 ease-in-out shadow-md hover:scale-105 hover:text-white hover:shadow-lg active:scale-90 before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-orange-600 before:to-orange-400 before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-full hover:before:left-0">
                                    ENVIAR MENSAJE <i class="ml-4 fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex flex-col md:flex-row items-start md:items-center mt-6">
            <div class="w-full md:w-1/2 h-80 mb-40 mt-4">
                <iframe class="w-full h-full rounded-lg shadow-md"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.679616569875!2d-2.4676975241593677!3d36.8501483722329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7075f9253c8cfd%3A0x10423ef17d0655c!2sI.E.S.%20Al-%C3%81ndalus!5e0!3m2!1ses!2ses!4v1716539554474!5m2!1ses!2ses"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="w-full md:w-1/2 mt-8 md:mt-0 md:ml-12">
                <h2 class="text-3xl font-bold mb-4 text-orange-600">¿Quiénes Somos?</h2>
                <p class="text-gray-300 text-lg mb-40">
                    Somos Turbo Motors, una empresa dedicada a la venta de coches online, ofreciendo una amplia variedad
                    de marcas y
                    modelos para satisfacer las necesidades de todos nuestros clientes. Nos enorgullecemos de brindar un
                    servicio de alta calidad, asegurando que cada cliente encuentre el vehículo perfecto para ellos.
                    <br><br>
                    Nuestro equipo está compuesto por profesionales con años de experiencia en el sector automotriz,
                    comprometidos con la transparencia, la honestidad y la satisfacción del cliente. Estamos ubicados en
                    un lugar accesible y conveniente para todos en la ciudad de Amería.
                    <br><br>
                    ¡Visítanos y encuentra tu próximo coche con nosotros! <span class="text-xl">&#128678 &#128663</span>
                </p>
            </div>
        </section>
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
