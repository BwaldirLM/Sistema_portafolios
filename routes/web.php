<?php
use App\Http\Controllers\CargaAcademicaController;
use App\Http\Controllers\CursoController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/carga-academica/{idDocente}', [CargaAcademicaController::class, 'mostrarCargaAcademica']);

Route::resource('cursos',CursoController::class);