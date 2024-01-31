<?php

namespace App\Http\Controllers;
use App\Models\CargaAcademica;
use App\Models\PresentacionPortafolio;
use App\Models\Contenido;
use App\Models\Evaluaciones;
use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use Illuminate\Support\Facades\Auth;

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
    public function show($codigo)
    {
        if(Auth::user()->TipoUsuario == 'docente'){
            $curso = Curso::find($codigo);
            

            if (!$curso) {
                abort(404); // Manejar el caso en que el curso no se encuentre
            }

            // Recuperar datos de PresentacionPortafolio
            $presentacionPortafolio = PresentacionPortafolio::where('IDCargaAcademica', $curso->IDCargaAcademica)->first();

            // Recuperar datos de Contenido
            $contenido = Contenido::where('IDCargaAcademica', $curso->IDCargaAcademica)->first();

            // Recuperar datos de Evaluaciones
            $evaluaciones = Evaluaciones::where('IDCargaAcademica', $curso->IDCargaAcademica)->first();

            return view('cursos.show', compact('curso', 'presentacionPortafolio', 'contenido', 'evaluaciones'));
        }else{
            //$curso = Curso::find($codigo)
            //->select('IDCurso', 'NombreCurso', 'Creditos', 'TipoClase', 'IDCargaAcademica')
            //->first();

            $curso = Curso::with(['cargaAcademica.docente'])
            //->select('IDCurso', 'NombreCurso', 'Creditos', 'TipoClase')
            ->where('IDCurso', $codigo)
            ->first();
            $curso->Nombre = $curso->cargaAcademica->docente->Nombre;
            echo $curso;
            //Curso::join('carga_academicas', 'cursos.IDCargaAcademica', '=', 'carga_academicas.IDCargaAcademica')
            //->join('users', 'carga_academicas.IDDocente', '=', 'users.id')
            //->select('users.Nombre','IDCurso', 'NombreCurso', 'Creditos', 'TipoClase', 'carga_academicas.IDCargaAcademica')
            //->where('cursos.IDCurso', '=', $codigo)
            //->first();
            //dd($curso);
            if (!$curso) {
                abort(404); // Manejar el caso en que el curso no se encuentre
            }

            // Recuperar datos de PresentacionPortafolio
            $presentacionPortafolio = PresentacionPortafolio::where('IDCargaAcademica', $curso->IDCargaAcademica)->first();

            // Recuperar datos de Contenido
            $contenido = Contenido::where('IDCargaAcademica', $curso->IDCargaAcademica)->first();

            // Recuperar datos de Evaluaciones
            $evaluaciones = Evaluaciones::where('IDCargaAcademica', $curso->IDCargaAcademica)->first();

            return view('cursos.show', compact('curso', 'presentacionPortafolio', 'contenido', 'evaluaciones'));
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

