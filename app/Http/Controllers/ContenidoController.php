<?php

namespace App\Http\Controllers;
use App\Models\Contenido;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Evaluaciones;

class ContenidoController extends Controller
{
    
    public function index($idCargaAcademica)
    {
        //Muestra si el usuario es un revisor
        if(Auth::user()->TipoUsuario == 'revisor'){
            $docentes = User::join('carga_academicas', 'users.id', '=', 'carga_academicas.IDDocente')
            ->join('cursos', 'carga_academicas.IDCargaAcademica', '=', 'cursos.IDCargaAcademica')
            ->select('users.Nombre', 'cursos.IDCurso')
            ->where('carga_academicas.IDRevisor', '=', Auth::user()->id)
            ->get();
            //User::where('TipoUsuario', 'Docente')->with('cursos')->get();
            //dd($docentes);
            return view('presentacion.contenido',['idCargaAcademica' => $idCargaAcademica]);
        }
    }
    public function index2($idCargaAcademica)
    {
        //Muestra si el usuario es un revisor
        if(Auth::user()->TipoUsuario == 'revisor'){
            $docentes = User::join('carga_academicas', 'users.id', '=', 'carga_academicas.IDDocente')
            ->join('cursos', 'carga_academicas.IDCargaAcademica', '=', 'cursos.IDCargaAcademica')
            ->select('users.Nombre', 'cursos.IDCurso')
            ->where('carga_academicas.IDRevisor', '=', Auth::user()->id)
            ->get();
            //User::where('TipoUsuario', 'Docente')->with('cursos')->get();
            //dd($docentes);
            return view('presentacion.evaluaciones', ['idCargaAcademica' => $idCargaAcademica]);
        }
    }

    public function store(Request $request)
    {
        // Recuperar las secciones desde el formulario o desde donde tengas definidas las secciones
        $secciones = ['Silabo', 'Avance', 'Asistencia'];
        $id_carga_academica = $request->input('id_carga_academica');
        // Crear una instancia del modelo PresentacionPortafolio2
        $contenido = new Contenido();
        
        // Asignar valores a las propiedades del modelo según la selección del usuario
        $contenido->IDCargaAcademica = $id_carga_academica; // Asigna el valor adecuado según tus necesidades

        foreach ($secciones as $seccion) {
            $campo = strtolower($seccion);
            $valor = $request->input($campo, 'No');

            // Asignar valores según la lógica de Totalmente, Parcialmente, No
            $contenido->{$seccion} = ($valor == 'Totalmente') ? 2 : (($valor == 'Parcialmente') ? 1 : 0);
        }

        // Guardar en la base de datos
        $contenido->save();

        // Puedes redirigir al usuario a donde desees después de guardar los datos
        //return redirect()->back()->with('success', 'Datos guardados exitosamente');
        return redirect()->route('dashboard')->with('success', 'Datos guardados exitosamente');

    }
    public function store2(Request $request)
    {
        // Recuperar las secciones desde el formulario o desde donde las tengas definidas
        $secciones = ['EvaluacionEntrada', 'PrimeraParcial', 'SegundaParcial', 'TerceraParcial', 'Sustitutorio'];
        $id_carga_academica = $request->input('id_carga_academica');
        // Crear una instancia del modelo Evaluacion
        $evaluacion = new Evaluaciones();
        $evaluacion->IDCargaAcademica = $id_carga_academica; // Asigna el valor adecuado según tus necesidades

        foreach ($secciones as $seccion) {
            $campo = strtolower(str_replace(' ', '', $seccion));
            $valor = $request->input($campo, 'No');

            // Asignar valores según la lógica de Totalmente, Parcialmente, No
            $evaluacion->{$campo} = ($valor == 'Totalmente') ? '2' : (($valor == 'Parcialmente') ? '1' : '0');
        }

        // Guardar en la base de datos
        $evaluacion->save();

        // Puedes redirigir al usuario a donde desees después de guardar los datos
        return redirect()->route('dashboard')->with('success', 'Datos guardados exitosamente');
    }

}