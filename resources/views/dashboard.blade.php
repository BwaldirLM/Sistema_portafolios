<x-app-layout>
    
    @if(Auth::user()->TipoUsuario=='revisor')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de Docentes') }}
        </h2>
    </x-slot>

        <div class="mt-4 p-4 bg-secondary" style="width: 550px;">
        @if(count($docentes) > 0)
            <div class="list-group">
                @foreach($docentes as $docente)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-1"><strong>{{ $loop->iteration }}.</strong> {{ $docente->Nombre }}</h5>
                            </div>
                            <a href="{{ route('curso.show', $docente->IDCurso) }}" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay docentes registrados.</p>
        @endif
    </div>
</div>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Docente') }}
        </h2>
    </x-slot>
        <div class="container">
            <h1>{{ Auth::user()->Nombre}} - Carga Académica</h1>

            <div class="card">
                <div class="card-body">
                    <h2>Revisor Asignado:</h2>
                    <p>{{ $cargaAcademica->revisor->Nombre ?? 'N/A' }}</p>
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




    
    @endif

    
</x-app-layout>
