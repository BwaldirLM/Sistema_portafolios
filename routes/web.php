<?php
use App\Http\Controllers\CargaAcademicaController;
use App\Http\Controllers\PresentacionPortafolioController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

Route::get('/carga-academica/{idDocente}', [CargaAcademicaController::class, 'mostrarCargaAcademica']);

Route::resource('cursos',CursoController::class);
Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/curso/{id}', [CursoController::class, 'show'])->name('curso.show');
Route::get('/presentacionportafolio', [PresentacionPortafolioController::class, 'index'])->name('presentacionportafolio.index');
Route::post('/contenido', [ContenidoController::class, 'store'])->name('contenido.store');
Route::get('/contenido', [ContenidoController::class, 'index'])->name('contenido.index');
Route::post('/presentacionportafolio', [PresentacionPortafolioController::class, 'store'])->name('presentacionportafolio.store');
Route::get('/evaluaciones', [ContenidoController::class, 'index2'])->name('evaluaciones.index');
Route::post('/evaluaciones', [ContenidoController::class, 'store2'])->name('evaluaciones.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php
use App\Http\Controllers\CargaAcademicaController;
use App\Http\Controllers\PresentacionPortafolioController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

Route::get('/carga-academica/{idDocente}', [CargaAcademicaController::class, 'mostrarCargaAcademica']);

Route::resource('cursos',CursoController::class);
Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/curso/{id}', [CursoController::class, 'show'])->name('curso.show');
//Route::get('/presentacionportafolio', [PresentacionPortafolioController::class, 'index'])->name('presentacionportafolio.index');
Route::post('/contenido', [ContenidoController::class, 'store'])->name('contenido.store');
Route::get('/contenido/{idCargaAcademica}', [ContenidoController::class, 'index'])->name('contenido.index');
Route::post('/presentacionportafolio', [PresentacionPortafolioController::class, 'store'])->name('presentacionportafolio.store');
Route::get('/evaluaciones/{idCargaAcademica}', [ContenidoController::class, 'index2'])->name('evaluaciones.index');
Route::post('/evaluaciones', [ContenidoController::class, 'store2'])->name('evaluaciones.store');
Route::get('/presentacionportafolio/{idCargaAcademica}', [PresentacionPortafolioController::class, 'index'])->name('presentacionportafolio.index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
