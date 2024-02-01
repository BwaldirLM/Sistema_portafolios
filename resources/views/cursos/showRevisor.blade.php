
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Revision') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col">
                <p><strong>Docente:</strong> {{ $curso->Nombre }}</p>
                <p><strong>Codigo del curso:</strong> {{ $curso->IDCurso }}</p>
                <p><strong>Curso:</strong> {{ $curso->NombreCurso }}</p>
                <p><strong>Creditos:</strong> {{$curso->Creditos}}</p>
                <p><strong>Tipo:</strong> {{$curso->TipoClase}}</p>
                <!-- Agrega más detalles según tus necesidades -->
    
            </div>
            <div class="col">
            <div class="btn-group-vertical">
                <a href="#" class="btn btn-success p-2 m-1" >Presentación de Portafolio</a>
                <a href="#" class="btn btn-success p-2 m-1" >Contenido</a>
                <a href="#" class="btn btn-success p-2 m-1" >Evaluaciones</a>
            </div>
        </div>
        </div>
        
        <h2 class="text-center">Estadísticas</h2>
        
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
            <div style="width: 600px" class="container align-self-center">
                <div class="row align-items-center">
                    <div class="col-12">
                        <p>No:</p>
                    </div>
                    <div class="progress-bar col-12" style="width: {{ $porcentajeCeros }}%; background-color: red;">
                        <span class="progress-label">{{ $porcentajeCeros }}%</span>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12">
                        <p>Parcialmente:</p>
                    </div>
                    <div class="progress-bar col-12" style="width: {{ $porcentajeUnos }}%; background-color: yellow;">
                        <span class="progress-label">{{ $porcentajeUnos }}%</span>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12">
                        <p>Totalmente:</p>
                    </div>
                    <div class="progress-bar col-12" style="width: {{ $porcentajeDoses }}%; background-color: green;">
                        <span class="progress-label">{{ $porcentajeDoses }}%</span>
                    </div>
                </div>                    
            </div>
        @else
        <div class="text-center">
            <p>No hay datos suficientes para calcular estadísticas.</p>
        </div>
        @endif   
        
    </div>
      
    
    
 </x-app-layout>
