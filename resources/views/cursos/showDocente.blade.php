<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del curso') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><strong>Código del Curso:</strong> {{ $curso->IDCurso }}</p>
                <p><strong>Nombre del Curso:</strong> {{ $curso->NombreCurso }}</p>
                <p><strong>Créditos:</strong> {{ $curso->Creditos }}</p>
                <p><strong>Tipo:</strong> {{$curso->TipoClase}}</p>
            </div>
            <div class="col">
                <h2>Estadísticas</h2>
        
                @if ($presentacionPortafolio && $contenido && $evaluaciones)
                    @php
                    $totalAspectos = count(['Caratula', 'CargaAcademica', 'FilosofiaDocente', 'CV', 'Silabo', 'Avance', 'Asistencia', 'EvaluacionEntrada', 'PrimeraParcial', 'SegundaParcial', 'TerceraParcial', 'Sustitutorio']);
                    $conteoCeros = 0;
                    $conteoUnos = 0;
                    $conteoDoses = 0;

                    foreach(['Caratula', 'CargaAcademica', 'FilosofiaDocente', 'CV', 'Silabo', 'Avance', 'Asistencia', 'EvaluacionEntrada', 'PrimeraParcial', 'SegundaParcial', 'TerceraParcial', 'Sustitutorio'] as $aspecto) {
                        switch ($aspecto) {
                            case 'Caratula':
                            case 'CargaAcademica':
                            case 'FilosofiaDocente':
                            case 'CV':
                                $valor = $presentacionPortafolio->$aspecto;
                                break;
                            case 'Silabo':
                            case 'Avance':
                            case 'Asistencia':
                                $valor = $contenido->$aspecto;
                                break;
                            case 'EvaluacionEntrada':
                            case 'PrimeraParcial':
                            case 'SegundaParcial':
                            case 'TerceraParcial':
                            case 'Sustitutorio':
                                $valor = $evaluaciones->$aspecto;
                                break;
                        }

                        switch ($valor) {
                            case '0':
                                $conteoCeros++;
                                break;
                            case '1':
                                $conteoUnos++;
                                break;
                            case '2':
                                $conteoDoses++;
                                break;
                        }
                    }

                    // Calcula porcentajes
                    $porcentajeCeros = round(($conteoCeros / $totalAspectos) * 100);
                    $porcentajeUnos = round(($conteoUnos / $totalAspectos) * 100);
                    $porcentajeDoses = round(($conteoDoses / $totalAspectos) * 100);
                    @endphp
           

                <p>No:</p>
                <div class="progress-bar" style="width: {{ $porcentajeCeros }}%; background-color: red;">
                    <span class="progress-label">{{ $porcentajeCeros }}%</span>
                </div>

                <p>Parcialmente:</p>
                <div class="progress-bar" style="width: {{ $porcentajeUnos }}%; background-color: yellow;">
                    <span class="progress-label">{{ $porcentajeUnos }}%</span>
                </div>

                <p>Totalmente:</p>
                <div class="progress-bar" style="width: {{ $porcentajeDoses }}%; background-color: green;">
                   <span class="progress-label">{{ $porcentajeDoses }}%</span>
                </div>
                @else
                    <p>No hay datos suficientes para calcular estadísticas.</p>
                @endif
            </div>
            <div class="mt-4">
            <a href="#" class="btn btn-success" >Presentación de Portafolio</a>
            <a href="#" class="btn btn-success" >Contenido</a>
            <a href="#" class="btn btn-success" >Evaluaciones</a>
        </div>
        </div>
    </div>
</x-app-layout>