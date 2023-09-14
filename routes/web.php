<?php

use App\Http\Controllers\CriterioController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('personas', [PersonaController::class, 'index'])->name('personas.index');
    Route::get('registrar', [PersonaController::class, 'create'])->name('registrar.persona');
    Route::get('persona', [PersonaController::class, 'show'])->name('ver.persona');
    Route::post('registrar', [PersonaController::class, 'store']);
    Route::put('/registrar/{persona}', [PersonaController::class, 'update'])->name('actualizar.persona');
    Route::delete('/registrar/{persona}', [PersonaController::class, 'destroy'])->name('eliminar.persona');

    Route::get('grupos', [GrupoController::class, 'index'])->name('grupos.index');
    Route::get('crear/grupos', [GrupoController::class, 'create'])->name('grupos.create');
    Route::get('edit/grupos/{grupo}', [GrupoController::class, 'edit'])->name('grupos.editar');
    Route::post('grupos/agregar', [GrupoController::class, 'store'])->name('registrar.grupo');
    Route::get('grupos/ver/{id}', [GrupoController::class, 'verGrupo'])->name('ver.grupo');
    Route::put('grupos/actualizar/{grupo}',[GrupoController::class, 'update'])->name('actualizar.grupo');

    Route::post('integrantes', [IntegranteController::class, 'store'])->name('grupo.registrar.integrante');
    Route::put('integrantes/{integrante}', [IntegranteController::class, 'update'])->name('grupo.actualizar.integrante');
    Route::get('/search-integrante/{dni}', [GrupoController::class, 'searchIntegrante']);

    Route::get('evaluacion', [CriterioController::class, 'index'])->name('evaluacion.index');
    Route::get('crear/evaluacion', [CriterioController::class, 'create'])->name('evaluacion.create');
    Route::get('grupos/evaluar/{id}', [EvaluacionController::class, 'evaluarGrupo'])->name('evaluar.grupo');

});

require __DIR__.'/auth.php';
