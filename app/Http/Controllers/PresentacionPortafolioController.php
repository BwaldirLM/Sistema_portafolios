<?php

namespace App\Http\Controllers;

use App\Models\PresentacionPortafolio;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class PresentacionPortafolioController extends Controller
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
            return view('presentacion.presentacionportafolio', ['idCargaAcademica' => $idCargaAcademica]);
        }
    }

    public function store(Request $request)
    {
        // Recuperar las secciones desde el formulario o desde donde tengas definidas las secciones
        $secciones = ['Caratula', 'CargaAcademica', 'FilosofiaDocente', 'CV'];
        $id_carga_academica = $request->input('id_carga_academica'); 
        // Crear una instancia del modelo PresentacionPortafolio2
        $presentacion = new PresentacionPortafolio();
        
        // Asignar valores a las propiedades del modelo según la selección del usuario
        $presentacion->IDCargaAcademica = $id_carga_academica;
        foreach ($secciones as $seccion) {
            $campo = strtolower($seccion);
            $valor = $request->input($campo, 'No');

            // Asignar valores según la lógica de Totalmente, Parcialmente, No
            $presentacion->{$seccion} = ($valor == 'Totalmente') ? 2 : (($valor == 'Parcialmente') ? 1 : 0);
        }

        // Guardar en la base de datos
        $presentacion->save();

        // Puedes redirigir al usuario a donde desees después de guardar los datos
        //return redirect()->back()->with('success', 'Datos guardados exitosamente');
        return redirect()->route('dashboard')->with('success', 'Datos guardados exitosamente');

    }
}