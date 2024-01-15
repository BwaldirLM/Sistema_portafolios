<?php

namespace App\Http\Controllers;
use App\Models\Curso;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function show($id)
    {
        $curso = Curso::where('IDCurso', $id)
        ->join('users', 'cursos.IDDocente', '=', 'users.id')
        ->select('users.Nombre', 'cursos.IDCurso', 'cursos.NombreCurso', 'cursos.Creditos', 'cursos.TipoClase')
        ->get();
        //Curso::where('IDCurso', $id)->get();// Obtener el curso desde la base de datos usando el modelo correspondiente
        dd($curso);
        // Devolver la vista con los datos del curso
        return view('cursos.show', ['curso' => $curso]);
    }
}
