<x-app-layout>
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
</x-app-layout>
