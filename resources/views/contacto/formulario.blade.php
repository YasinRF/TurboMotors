<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <style>
        body {
            background-color: #F8F9FA;
            font-family: 'Arial', sans-serif;
            color: #333333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        h1 {
            text-align: center;
            color: #F17424;
            font-size: 24px;
            margin-bottom: 20px;
        }

        h3 {
            text-align: center;
            
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .highlight {
            color: #F17424;
        }

        .message-box {
            background-color: #FFFFFF;
            border: 1px solid #E0E0E0;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 16px;
            color: #333333;
            line-height: 1.6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }

        .footer-line {
            border-top: 1px solid #DDDDDD;
            margin-top: 10px;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Formulario de Contacto</h1>
        <p><b>Nombre: </b><span class="highlight">{{ $nombre }}</span></p>
        <p><b>Email: </b><span class="highlight">{{ $email }}</span></p>
        <p><b>Tipo Usuario: </b><span class="highlight">{{ $tipoUsuario }}</span></p>
        <hr>
        <h3>Mensaje</h3>
        <div class="message-box">
            {{ $mensaje }}
        </div>
    </div>
    <div class="footer">
        Este es un mensaje generado automáticamente. Por favor, no responda a este correo.
        <div class="footer-line">
            &copy; 2024 TurboMotors. Todos los derechos reservados.
        </div>
    </div>
</body>

</html>
