<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESENTACION DE PORTAFOLIO</title>
    <!-- En Laravel, usa asset para enlazar recursos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('estilos/estilos.css') }}">
</head>
<body>
    <div class="container">
        <h1>PRESENTACION DE PORTAFOLIO</h1>
        
        <form action="{{ route('presentacionportafolio.store') }}" method="POST">
            @csrf

            <?php
                $secciones = ['Caratula', 'CargaAcademica', 'FilosofiaDocente', 'CV'];
            ?>

            @foreach($secciones as $seccion)
                <div class="section">
                    <div class="question">
                        <h2>{{ $seccion }}</h2>
                        <div class="options">
                            <label>
                                <input type="radio" name="{{ strtolower($seccion) }}" value="No">
                                No
                            </label>
                            <label>
                                <input type="radio" name="{{ strtolower($seccion) }}" value="Parcialmente">
                                Parcialmente
                            </label>
                            <label>
                                <input type="radio" name="{{ strtolower($seccion) }}" value="Totalmente" checked>
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
