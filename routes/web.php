<?php

use App\Http\Controllers\CriterioController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

    Route::get('users', [UserController::class, 'index'])->middleware('permission:users.index')->name('users.index');
    Route::get('/search-user/{dni}', [UserController::class, 'searchUsuario']);
    Route::post('registrar/user', [UserController::class, 'store'])->middleware('permission:users.store')->name('user.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->middleware('permission:profile.edit')->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware('permission:profile.update')->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('permission:profile.destroy')->name('profile.destroy');

    Route::get('personas', [PersonaController::class, 'index'])->middleware('permission:personas.index')->name('personas.index');
    Route::get('registrar', [PersonaController::class, 'create'])->middleware('permission:personas.create')->name('registrar.persona');
    Route::get('persona', [PersonaController::class, 'show'])->middleware('permission:personas.show')->name('ver.persona');
    Route::post('registrar', [PersonaController::class, 'store'])->middleware('permission:personas.store');
    Route::put('/registrar/{persona}', [PersonaController::class, 'update'])->middleware('permission:personas.update')->name('actualizar.persona');
    Route::delete('/registrar/{persona}', [PersonaController::class, 'destroy'])->middleware('permission:personas.destroy')->name('eliminar.persona');

    Route::get('grupos', [GrupoController::class, 'index'])->middleware('permission:grupos.index')->name('grupos.index');
    Route::get('crear/grupos', [GrupoController::class, 'create'])->middleware('permission:grupos.create')->name('grupos.create');
    Route::get('edit/grupos/{grupo}', [GrupoController::class, 'edit'])->middleware('permission:grupos.edit')->name('grupos.editar');
    Route::post('grupos/agregar', [GrupoController::class, 'store'])->middleware('permission:grupos.store')->name('registrar.grupo');
    Route::get('grupos/ver/{id}', [GrupoController::class, 'verGrupo'])->middleware('permission:grupos.verGrupo')->name('ver.grupo');
    Route::put('grupos/actualizar/{grupo}',[GrupoController::class, 'update'])->middleware('permission:grupos.update')->name('actualizar.grupo');
    Route::delete('grupos/eliminar/{grupo}',[GrupoController::class, 'destroy'])->middleware('permission:grupos.destroy')->name('eliminar.grupo');

    Route::post('integrantes', [IntegranteController::class, 'store'])->middleware('permission:integrantes.store')->name('grupo.registrar.integrante');
    Route::put('integrantes/{integrante}', [IntegranteController::class, 'update'])->middleware('permission:integrantes.update')->name('grupo.actualizar.integrante');
    Route::get('/search-integrante/{dni}', [GrupoController::class, 'searchIntegrante']);
    Route::delete('integrante/eliminar/{integrante}', [IntegranteController::class, 'destroy'])->middleware('permission:integrantes.destroy')->name('grupo.eliminar.integrante');

    Route::get('evaluacion', [CriterioController::class, 'index'])->middleware('permission:evaluacion.index')->name('evaluacion.index');
    Route::get('evaluacion/integrante/{grupo_id}/{id}', [EvaluacionController::class, 'evaluarintegrante'])->middleware('permission:evaluacion.evaluarintegrante')->name('evaluacion.integrante');
    Route::get('grupos/evaluar/{id}', [EvaluacionController::class, 'evaluarGrupo'])->middleware('permission:evaluacion.evaluarGrupo')->name('evaluar.grupo');
    Route::post('guardar/evaluacion', [EvaluacionController::class, 'store'])->middleware('permission:evaluacion.store')->name('guardar.evaluacion');
    Route::post('guardar/total', [EvaluacionController::class, 'guardarEvaluacion'])->middleware('permission:evaluacion.guardarEvaluacion')->name('guardar.total');
    Route::get('evaluacion/editar/{grupo_id}/{id}', [EvaluacionController::class, 'editarEvaluacion'])->middleware('permission:evaluacion.editarEvaluacion')->name('evaluacion.editar');
    Route::put('evaluacion/actualizar/{grupo_id}/{id}', [EvaluacionController::class, 'editUpdate'])->middleware('permission:evaluacion.editUpdate')->name('actualizar.evaluacion');
    Route::put('actualizar/{evaluacion_grupo}/', [EvaluacionController::class, 'totalUpdate'])->middleware('permission:evaluacion.totalUpdate')->name('actualizar.total');

    Route::get('reporte',[ReportController::class,'index'])->middleware('permission:reportes.index')->name('ver.reporte');
    Route::get('grupos/reporte',[ReportController::class,'pdfGrupo'])->middleware('permission:reportes.pdfGrupo')->name('grupos.reporte');
    Route::get('grupos/reporte/{id}',[ReportController::class,'verReporte'])->name('individual.reporte');
});

require __DIR__.'/auth.php';
