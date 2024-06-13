<x-app-layout>
    <style>
        .titulo {
            color: #F17324;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .card {
            background-color: #252a32;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #F17324;
        }

        .card-content {
            color: #cbd5e0;
        }

        @keyframes clockwise {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes counter-clockwise {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        .gearbox {
            background: #1d232e;
            height: 150px;
            width: 200px;
            position: relative;
            border: none;
            overflow: hidden;
            border-radius: 6px;
        }

        .gearbox .overlay {
            border-radius: 6px;
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            box-shadow: inset 0px 0px 20px black;
            transition: background 0.2s;
        }

        .gearbox .overlay {
            background: transparent;
        }

        .gear {
            position: absolute;
            height: 60px;
            width: 60px;
            box-shadow: 0px -1px 0px 0px #888888, 0px 1px 0px 0px black;
            border-radius: 30px;
        }

        .gear.large {
            height: 120px;
            width: 120px;
            border-radius: 60px;
        }

        .gear.large:after {
            height: 96px;
            width: 96px;
            border-radius: 48px;
            margin-left: -48px;
            margin-top: -48px;
        }

        .gear.one {
            top: 12px;
            left: 10px;
        }

        .gear.two {
            top: 61px;
            left: 60px;
        }

        .gear.three {
            top: 110px;
            left: 10px;
        }

        .gear.four {
            top: 13px;
            left: 128px;
        }

        .gear:after {
            content: "";
            position: absolute;
            height: 36px;
            width: 36px;
            border-radius: 36px;
            background: #111;
            top: 50%;
            left: 50%;
            margin-left: -18px;
            margin-top: -18px;
            z-index: 3;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1), inset 0px 0px 10px rgba(0, 0, 0, 0.1), inset 0px 2px 0px 0px #090909, inset 0px -1px 0px 0px #888888;
        }

        .gear-inner {
            position: relative;
            height: 100%;
            width: 100%;
            background: #555;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .large .gear-inner {
            border-radius: 60px;
        }

        .gear.one .gear-inner {
            animation: counter-clockwise 3s infinite linear;
        }

        .gear.two .gear-inner {
            animation: clockwise 3s infinite linear;
        }

        .gear.three .gear-inner {
            animation: counter-clockwise 3s infinite linear;
        }

        .gear.four .gear-inner {
            animation: counter-clockwise 6s infinite linear;
        }

        .gear-inner .bar {
            background: #555;
            height: 16px;
            width: 76px;
            position: absolute;
            left: 50%;
            margin-left: -38px;
            top: 50%;
            margin-top: -8px;
            border-radius: 2px;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .large .gear-inner .bar {
            margin-left: -68px;
            width: 136px;
        }

        .gear-inner .bar:nth-child(2) {
            transform: rotate(60deg);
        }

        .gear-inner .bar:nth-child(3) {
            transform: rotate(120deg);
        }

        .gear-inner .bar:nth-child(4) {
            transform: rotate(90deg);
        }

        .gear-inner .bar:nth-child(5) {
            transform: rotate(30deg);
        }

        .gear-inner .bar:nth-child(6) {
            transform: rotate(150deg);
        }
    </style>

    <div class="m-3">
        <div class="flex justify-center m-6">
            <h1 class="mt-10 mx-6 titulo text-4xl font-semibold">PANEL DE GESTIÓN</h1>

            <div class="gearbox mx-6">
                <div class="overlay"></div>
                <div class="gear one">
                    <div class="gear-inner">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="gear two">
                    <div class="gear-inner">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="gear three">
                    <div class="gear-inner">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="gear four large">
                    <div class="gear-inner">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="card">
                <h2 class="card-title">Usuarios totales<i class="mx-2 fas fa-user-group text-2xl"></i></h2>
                <p class="card-content">Actualmente hay <span
                        class="text-xl mx-1 text-orange-600">{{ $usuarios }}</span>
                    usuarios registrados en la plataforma.
                </p>
            </div>

            <div class="card">
                <h2 class="card-title">Coches en Inventario <i class="mx-2 fas fa-car text-2xl"></i></h2>
                <p class="card-content">Hay <span class="text-xl mx-1 text-orange-600">{{ $coches }}</span>
                    coches disponibles en el inventario.</p>
            </div>

            <div class="card">
                <h2 class="card-title">Lista de Ventas <i class="mx-2 fas fa-list text-2xl"></i></h2>
                <p class="card-content">En total, se han realizado <span
                        class="text-xl mx-1 text-orange-600">{{ $vendidos }}</span> ventas en la plataforma.</p>
            </div>

            <div class="card">
                <h2 class="card-title">Solicitudes de Deseo <i class="mx-2 fab fa-gratipay text-2xl"></i></h2>
                <p class="card-content">Hay <span class="text-xl mx-1 text-orange-600">{{ $deseos }}</span>
                    solicitudes totales de deseo por los usuarios.</p>
            </div>
        </div>
    </div>

</x-app-layout>
