<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCursoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($curso)
    {
        $curso = Curso::find($curso);

        if ($curso) {
            return view('cursos.show', compact('curso'));
        } else {
            abort(404); // Manejar el caso en que el curso no se encuentre
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }
}



    /*public function show($id)
    {
        $curso = Curso::where('IDCurso', $id)
        ->join('users', 'cursos.IDDocente', '=', 'users.id')
        ->select('users.Nombre', 'cursos.IDCurso', 'cursos.NombreCurso', 'cursos.Creditos', 'cursos.TipoClase')
        ->get();
        //Curso::where('IDCurso', $id)->get();// Obtener el curso desde la base de datos usando el modelo correspondiente
        dd($curso);
        // Devolver la vista con los datos del curso
        return view('cursos.show', ['curso' => $curso]);
    }*/

