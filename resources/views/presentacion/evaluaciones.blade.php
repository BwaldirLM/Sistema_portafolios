<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVALUACIONES</title>
    <!-- En Laravel, usa asset para enlazar recursos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('estilos/estilos.css') }}">
</head>
<body>
    <div class="container">
        <h1>EVALUACIONES</h1>
        
        <form action="{{ route('evaluaciones.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_carga_academica" value="{{ $idCargaAcademica }}">

            <?php
                $secciones = ['EvaluacionEntrada', 'PrimeraParcial', 'Segundaparcial', 'TerceraParcial', 'Sustitutorio'];
            ?>

            @foreach($secciones as $seccion)
                <div class="section">
                    <div class="question">
                        <h2>{{ $seccion }}</h2>
                        <div class="options">
                            <label>
                                <input type="radio" name="{{ strtolower(str_replace(' ', '', $seccion)) }}" value="No" checked>
                                No
                            </label>
                            <label>
                                <input type="radio" name="{{ strtolower(str_replace(' ', '', $seccion)) }}" value="Parcialmente">
                                Parcialmente
                            </label>
                            <label>
                                <input type="radio" name="{{ strtolower(str_replace(' ', '', $seccion)) }}" value="Totalmente" >
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
