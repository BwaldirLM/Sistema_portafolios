<?php

namespace App\Http\Controllers;
use App\Models\CargaAcademica;
use App\Models\Curso;
use App\Models\User;
use App\Http\Requests\StoreCargaAcademicaRequest;
use App\Http\Requests\UpdateCargaAcademicaRequest;

class CargaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarCargaAcademica($idDocente)
    {
        $docente = User::find($idDocente);

        if (!$docente || $docente->TipoUsuario !== 'docente') {
            abort(404); // Manejo del caso en que el User no sea un docente
        }

        $cargaAcademica = CargaAcademica::with('revisor','cursos')->where('IDDocente', $idDocente)->first();

        return view('carga_academica.mostrar', compact('docente', 'cargaAcademica'));
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCargaAcademicaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CargaAcademica $cargaAcademica)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CargaAcademica $cargaAcademica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCargaAcademicaRequest $request, CargaAcademica $cargaAcademica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CargaAcademica $cargaAcademica)
    {
        //
    }
}
