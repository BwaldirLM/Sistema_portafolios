<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\CargaAcademica;

class ProfileController extends Controller
{

    public function index()
    {
        // Muestra si el usuario es un revisor
        if (Auth::user()->TipoUsuario == 'revisor') {
            $docentes = User::join('carga_academicas', 'users.id', '=', 'carga_academicas.IDDocente')
                ->join('cursos', 'carga_academicas.IDCargaAcademica', '=', 'cursos.IDCargaAcademica')
                ->select('users.Nombre', 'cursos.IDCurso')
                ->where('carga_academicas.IDRevisor', '=', Auth::user()->id)
                ->get();
            // User::where('TipoUsuario', 'Docente')->with('cursos')->get();
            // dd($docentes);

            // Retornar la vista solo después de dd($docentes);
            return view('dashboard', compact('docentes'));
        }
        else
        {
                $docente = User::find(Auth::user()->id);

            if (!$docente || $docente->TipoUsuario !== 'docente') {
                abort(404); // Manejo del caso en que el User no sea un docente
            }

            $cargaAcademica = CargaAcademica::with('revisor','cursos')->where('IDDocente', Auth::user()->id)->first();

            return view('dashboard', compact('docente', 'cargaAcademica'));
        }
    }

       
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
