<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Evaluacion;
use App\Models\EvaluacionCriterio;
use App\Models\EvaluacionTotal;
use App\Models\Grupo;
use App\Models\Indicador;
use App\Models\Integrante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $integrante = Integrante::with('persona')->get();
        $indicador = Indicador::with('criterio')->get();

        return Inertia::render('Evaluacion/Create',[  
            'evaluaciones' => Evaluacion::with('criterio','indicador')->get(),          
            'criterios' => Criterio::with('indicador')->get(),
            'indicadores' => $indicador,
            'integrantes' => $integrante,
            'grupos' => Grupo::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->all();
        // $evaluacion = new Evaluacion();
        // $evaluacion->cantidad = $request->cantidad;
        // $evaluacion->puntaje = $request->puntaje;
        // $evaluacion->id_criterio = $request->id_criterio;
        // $evaluacion->id_indicador = $request->id_indicador;
        // $evaluacion->id_integrante = $request->id_integrante;
        // $evaluacion->id_grupo = $request->id_grupo;
        // $evaluacion->save();

        // $evaluacionCriterio = new EvaluacionCriterio();
        // $evaluacionCriterio->ptj_total_indicador = $request->ptj_total_indicador;
        // $evaluacionCriterio->id_evaluacion = $evaluacion->id;
        // $evaluacionCriterio->id_criterio = $request->id_criterio;
        // $evaluacionCriterio->id_integrante = $request->id_integrante;
        // $evaluacionCriterio->id_grupo = $request->id_grupo;
        // $evaluacionCriterio->save();

        // $evaluacionTotal = EvaluacionTotal::create([
        //     'ptj_total' => $request->ptj_total,
        //     'id_evaluacion_criterio' => $evaluacionCriterio->id,
        //     'id_grupo' => $request->id_grupo
        // ]);
        // $evaluacionTotal->save();
        // DB::commit();

    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluacion $evaluacion)
    {
        //
    }

    public function evaluarGrupo($id){
        $integrantes = Integrante::with('persona')->where('id_grupo',$id)->get();
        
        return Inertia::render('Evaluacion/Index',[
            'grupos' => Grupo::find($id),
            'integrantes' => $integrantes,
        ]);
    }

    public function evaluarintegrante($id_grupo, $id){
        $indicador = Indicador::with('criterio')->get();

        $integrantes = Integrante::with('persona')->where('id_grupo',$id_grupo)->get();
        $integranteSeleccionado = $integrantes->where('id', $id)->first();

        return Inertia::render('Evaluacion/Create',[
            'evaluaciones' => Evaluacion::with('criterio','indicador')->get(),          
            'criterios' => Criterio::with('indicador')->get(),
            'indicadores' => $indicador,
            'grupos' => Grupo::with('integrante')->get(),
            'integrantes' => $integranteSeleccionado,
            'id_grupo' => $id_grupo
        ]);
    }
}
