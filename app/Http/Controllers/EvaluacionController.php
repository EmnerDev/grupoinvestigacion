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
       // Obtener los datos del formulario
        //return $request->all();
    foreach ($request['evaluaciones'] as $key => $value) {

        foreach ($value['indicador'] as $ky => $val) {
            # code...
            //return $val;
            $evaluacion = Evaluacion::create([
                'puntaje' => $val['puntaje'],
                'cantidad' => $val['cantidad'],
                'id_criterio' => $val['id_criterio'],
                'id_indicador' => $val['id'],
                'id_integrante' => $request['integrante']['id'],
                'id_grupo' => $request['integrante']['id_grupo'],
            ]);

            $evaluacionCriterio = EvaluacionCriterio::create([
                'ptj_total_indicador' => $value['puntaje'],
                'id_evaluacion' => $evaluacion->id, // Usar el ID de la evaluación creada anteriormente
                'id_criterio' => $value['id'],
                'id_integrante' => $request['integrante']['id'],
                'id_grupo' =>$request['integrante']['id_grupo'],
            ]);

            // Crear un nuevo registro en la tabla 'evaluacion_total'
            $evaluacionTotal = EvaluacionTotal::create([
                'ptj_total' => $request['totalGeneral'],
                'id_evaluacion_criterio' => $evaluacionCriterio->id, // Usar el ID del detalle de evaluación creado anteriormente
                'id_grupo' => $request['integrante']['id_grupo'],
            ]);
        }
    }


    // Devolver una respuesta adecuada, por ejemplo, un mensaje de éxito
    return response()->json(['message' => 'Registros creados correctamente']);

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
            'grupos' => Grupo::with('evaluacionCriterio')->find($id),
            'evaluaciones' => Evaluacion::with('evaluacionCriterio')->get(),
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
