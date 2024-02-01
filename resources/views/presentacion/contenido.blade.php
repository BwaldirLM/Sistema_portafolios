
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTENIDO</title>
    <!-- En Laravel, usa asset para enlazar recursos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('estilos/estilos.css') }}">
</head>
<body>
    <div class="container">
        <h1>CONTENIDO</h1>
        
        <form action="{{ route('contenido.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_carga_academica" value="{{ $idCargaAcademica }}">

            <?php
                $secciones = ['Silabo', 'Avance', 'Asistencia'];
            ?>

            @foreach($secciones as $seccion)
                <div class="section">
                    <div class="question">
                        <h2>{{ $seccion }}</h2>
                        <div class="options">
                            <label>
                                <input type="radio" name="{{ strtolower($seccion) }}" value="No" checked>
                                No
                            </label>
                            <label>
                                <input type="radio" name="{{ strtolower($seccion) }}" value="Parcialmente">
                                Parcialmente
                            </label>
                            <label>
                                <input type="radio" name="{{ strtolower($seccion) }}" value="Totalmente" >
                                Totalmente
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="section">
                <div class="question2">
                    <button type="submit" id="guardar-btn">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

