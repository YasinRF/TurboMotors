<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" class="w-6" href="{{ Storage::url('imagenes/turboMotors-sinFondo.png') }}">

    <title>TurboMotors</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CDN FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CDN SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Script de Swiper.js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Styles -->
    @livewireStyles

</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    {{-- ALERT --}}

    @if (session('mensaje'))
        <script>
            console.log('mensaje');
            Swal.fire({
                icon: "warning",
                position: "bottom-end",
                background: '#1F2937',
                color: '#F27321',
                title: "{{ session('mensaje') }}",
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
                toast: true,
                customClass: {
                    popup: 'swal2-toast',
                    title: 'swal2-title-custom',
                    timerProgressBar: 'swal2-timer-bar-custom'
                },
                didOpen: (toast) => {
                    const timerProgressBar = Swal.getTimerProgressBar();
                    if (timerProgressBar) {
                        timerProgressBar.style.backgroundColor = '#F27321';
                    }
                }
            });

            const style = document.createElement('style');
            style.innerHTML = `
            .swal2-title-custom {
                font-size: 1.25rem;
                font-weight: bold;
            }
            .swal2-toast .swal2-title-custom {
                color: #F27321;
            }
            .swal2-timer-bar-custom {
                background: linear-gradient(to right, #ff4500, #ffa500);
                height: 0.25rem;
            }`;
            document.head.appendChild(style);
        </script>
    @endif

    @if (session('comprado'))
        <script>
            console.log('comprado');
            Swal.fire({
                icon: 'success',
                position: 'center',
                background: '#1F2937',
                color: '#F27321',
                title: '¡Compra completada!',
                text: "{{ session('comprado') }}",
                showConfirmButton: true,
                confirmButtonText: 'Ver mis coches',
                confirmButtonColor: '#F27321',
                timer: 5000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal2-popup-custom',
                    title: 'swal2-title-custom',
                    content: 'swal2-content-custom',
                    confirmButton: 'swal2-confirm-button-custom',
                    timerProgressBar: 'swal2-timer-bar-custom'
                },
                didOpen: (toast) => {
                    const timerProgressBar = Swal.getTimerProgressBar();
                    if (timerProgressBar) {
                        timerProgressBar.style.backgroundColor = '#F27321';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('vendidos.index') }}";
                }
            });

            const style = document.createElement('style');
            style.innerHTML = `
        .swal2-popup-custom {
            font-family: 'Arial', sans-serif;
            font-size: 1.5rem;
            border-radius: 15px;
        }
        .swal2-title-custom {
            font-size: 1.75rem;
            font-weight: bold;
        }
        .swal2-content-custom {
            font-size: 1.25rem;
            color: #fff;
        }
        .swal2-confirm-button-custom {
            background-color: #F27321;
            color: #fff;
            font-size: 1rem;
            padding: 0.5rem 1.5rem;
            border-radius: 10px;
        }
        .swal2-confirm-button-custom:hover {
            background-color: #ff4500;
        }
        .swal2-timer-bar-custom {
            background: linear-gradient(to right, #ff4500, #ffa500);
            height: 0.25rem;
        }`;
            document.head.appendChild(style);
        </script>
    @endif

</body>

</html>
