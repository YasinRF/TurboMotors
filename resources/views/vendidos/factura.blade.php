<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Factura de Coche</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #dedede;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #444;
        }

        .content {
            margin-top: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #f97316;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .text-gray {
            color: #777;
        }

        .billing-info,
        .payment-info {
            margin-bottom: 20px;
        }

        .billing-info p,
        .payment-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead {
            background-color: #f97316;
            color: white;
        }

        tfoot {
            background-color: #f2f2f2;
            font-weight: bold;
            margin-top: 150px;
        }

        .vehicle-image {
            width: 100%;
            max-width: 150px;
            display: block;
            margin: 20px auto;
        }

        .text-end {
            text-align: right;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Factura de Venta de Coche</h1>
    </div>
    <div class="container">
        <div class="content">
            <div class="section billing-info">
                <h2 class="section-title">Detalles de Facturación</h2>
                <p class="text-gray">Turbo Motors Corp.<br>Almería, 04005</p>
                <p class="text-gray">Factura Nº: {{ random_int(999999, 999999999) }}<br>Fecha: {{ date('d/m/Y') }}</p>
            </div>
            @foreach ($vendidos as $venta)
                <div class="section">
                    <table>
                        <thead>
                            <tr>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $venta->coche->marca->nombre }}</td>
                                <td>{{ $venta->coche->marca->modelo }}</td>
                                <td>{{ $venta->coche->fabricacion }}</td>
                                <td>{{ $venta->coche->nuevo == 'SI' ? 'Nuevo' : $venta->coche->kilometros . ' km' }}
                                </td>
                                <td>{{ $venta->coche->tipo->nombre }}</td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="4">Precio del Vehículo</td>
                                <td>{{ $venta->coche->precio }} €</td>
                            </tr>
                            <tr>
                                <td colspan="4">IVA (21%)</td>
                                <td>{{ round($venta->coche->precio * 0.21, 2) }} €</td>
                            </tr>
                            <tr>
                                <td colspan="4">Total</td>
                                <td>{{ round($venta->coche->precio * 1.21, 2) }} €</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endforeach
            <div class="section payment-info">
                <h2 class="section-title">Información del Comprador</h2>
                <p class="text-gray">Nombre del comprador: * Nombre *<br>Email del comprador: * ejemplo@email.com *
                </p>
            </div>
            <div class="section payment-info">
                <h2 class="section-title">Información de Pago</h2>
                <p class="text-gray">Turbo Motors SA<br>Nombre de la Cuenta: Banco de Yasin Rehla<br>Número de Cuenta:
                    ES 9876543210</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>¡Gracias por su solicitud de compra!</p>
        <p>© {{ date('Y') }} - Turbo Motors</p>
    </div>
</body>

</html>
