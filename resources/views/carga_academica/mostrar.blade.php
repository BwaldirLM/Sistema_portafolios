<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Título de tu página</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 2rem auto;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #446688;
            text-align: center;
        }

        .card {
            margin: 1rem 0;
            padding: 1rem;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #446688;
            margin-top: 1rem;
        }

        table {
            width: 100%;
            margin-top: 1rem;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .no-courses {
            margin-top: 1rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $docente->name }} - Carga Académica</h1>

        <div class="card">
            <div class="card-body">
                <h2>Revisor Asignado:</h2>
                <p>{{ $cargaAcademica->revisor->name ?? 'N/A' }}</p>
            </div>
        </div>

        <h2>Cursos Asociados:</h2>
        @if ($cargaAcademica !== null && $cargaAcademica->cursos->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Nombre del Curso</th>
                        <th>Ver Curso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cargaAcademica->cursos as $index => $curso)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $curso->NombreCurso }}</td>
                            <td>
                                <a href="{{ route('cursos.show', $curso->IDCurso) }}" class="btn btn-primary">Ver Curso</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-courses">No hay cursos asociados a esta carga académica.</p>
        @endif
    </div>
</body>
</html>
