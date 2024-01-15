<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Detalles del Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            width: 50%;
            margin: 2rem auto;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #446688;
        }

        p {
            margin: 0.5rem 0;
        }

        strong {
            color: #446688;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles del Curso</h1>

        <p><strong>Código del Curso:</strong> {{ $curso->CodigoCurso }}</p>
        <p><strong>Nombre del Curso:</strong> {{ $curso->NombreCurso }}</p>
        <p><strong>Créditos:</strong> {{ $curso->Creditos }}</p>

        <!-- Agrega más detalles según tus necesidades -->
    </div>
</body>
</html>
