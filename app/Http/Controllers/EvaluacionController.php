<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Evaluacion;
use App\Models\EvaluacionCriterio;
use App\Models\EvaluacionGrupo;
use App\Models\EvaluacionTotal;
use App\Models\Grupo;
use App\Models\Indicador;
use App\Models\Integrante;
use App\Models\Programacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Carbon\Carbon;

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
    //return $request->all();
    foreach ($request['evaluaciones'] as $key => $value) {

        foreach ($value['indicador'] as $ky => $val) {
            //return $val;
            $evaluacion = Evaluacion::create([
                'puntaje' => $val['puntaje'],
                'cantidad' => $val['cantidad'],
                'id_criterio' => $val['id_criterio'],
                'id_indicador' => $val['id'],
                'id_integrante' => $request['integrante']['id'],
                'id_grupo' => $request['integrante']['id_grupo'],
            ]);

        }
        $evaluacionCriterio = EvaluacionCriterio::create([
            'ptj_total_indicador' => $value['puntaje'],
            'id_evaluacion' => $evaluacion->id, // Usar el ID de la evaluación creada anteriormente
            'id_criterio' => $value['id'],
            'id_integrante' => $request['integrante']['id'],
            'id_grupo' =>$request['integrante']['id_grupo'],
        ]);

    }
    // Crear un nuevo registro en la tabla 'evaluacion_total'
    $evaluacionTotal = EvaluacionTotal::create([
       'ptj_total_integrante' => $request['totalGeneral'],
       'id_evaluacion_criterio' => $evaluacionCriterio->id, // Usar el ID del detalle de evaluación creado anteriormente
       'id_grupo' => $request['integrante']['id_grupo'],
       'id_integrante' => $request['integrante']['id'],
   ]);


    // Devolver una respuesta adecuada, por ejemplo, un mensaje de éxito
    return response()->json(['msj' => 'Registros creados correctamente', 'code' => 200,'id' => $request['integrante']['id_grupo']]);

    }

    public function guardarEvaluacion(Request $request){
        //return $request->all();

        $evaluacionGrupo = EvaluacionGrupo::create([
            'ptj_total_grupo' => $request['calcularTotal'],
            'categorias' => $request['totales']['categorias'],
            'revalidar' => $request['totales']['revalidar'],
            'id_evaluacion_total' => $request['totales']['id_evaluacion_total'],
            'id_grupo' => $request['totales']['id_grupo'],
        ]);

    //return $evaluacionGrupo;
    return response()->json(['msj' => 'Grupo categorizado correctamente','datosEvaluacion' => $evaluacionGrupo, 'code' => 200]);

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
        $integrantes = Integrante::with('persona','evaluacionCriterio', 'evaluacionTotal')->where('id_grupo',$id)->get();

        //return $integrantes;
        //$evaluacionGrupo = EvaluacionGrupo::with('grupo')->get();
        $grupo = Grupo::with('evaluacionCriterio', 'evaluacionTotal', 'evaluacionGrupos')->find($id);

        // Formatear las fechas dentro de la colección de evaluacionGrupos
        $grupo->evaluacionGrupos->map(function ($evaluacionGrupo) {
            $evaluacionGrupo->fecha_formateada = Carbon::parse($evaluacionGrupo->created_at)->format('Y-m-d');
            // Puedes ajustar el formato según tus necesidades
            return $evaluacionGrupo;
        });
        //$guardarTotal = Grupo::with('evaluacionGrupos')->get();
        $evaluacionGeneral = EvaluacionTotal::get();

        //return $grupos;
        return Inertia::render('Evaluacion/Index',[
            'grupos' => $grupo,
            'evaluacion_criterios' => EvaluacionCriterio::with('integrante.persona','grupo')->get(),
            'integrantes' => $integrantes,
            //'evaluacion_grupos' => $evaluacionGrupo,
            'evaluacion_totals' => $evaluacionGeneral,
            'programacions' => Programacion::get(),
            'categoria' => EvaluacionGrupo::enumCategoriaOption(),
            'revalidar' => EvaluacionGrupo::enumRevalidarOption()
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

    public function editarEvaluacion($id_grupo,$id){
        //$a = Integrante::with('persona','evaluacion')->find($id);
        $a = Integrante::with('persona','evaluacion.criterio.indicador')->find($id);
        //return $a;
        $criterio_evalua = EvaluacionCriterio::find($id);
        $indicador = Indicador::with('criterio')->get();

        $integrantes = Integrante::with('persona')->where('id_grupo',$id_grupo)->get();
        $integranteSeleccionado = $integrantes->where('id', $id)->first();

        return Inertia::render('Evaluacion/Edit',[
            'evaluaciones' => Evaluacion::with('criterio','indicador')->get(),
            'criterios' => Criterio::with('indicador')->get(),
            'indicadores' => $indicador,
            'grupos' => Grupo::with('integrante')->get(),
            'integrantes' => $a,
            'id_grupo' => $id_grupo
        ]);
    }

    public function editUpdate(Request $request,$grupo_id,$id){
        //return $request->all();

        DB::beginTransaction();
        try {
            foreach ($request['evaluaciones'] as $key => $value) {
                //return $value;
                Evaluacion::where('id_indicador',$value['id'])->where('id_grupo', $value['id_grupo'])
                            ->where('id_integrante',$value['id_integrante'])
                            ->update([
                                'cantidad'=>$value['cantidad'],
                                'puntaje'=>$value['puntaje']
                            ]);
            }

            foreach ($request['criterio'] as $k => $val) {
               EvaluacionCriterio::where('id_criterio', $val['id'])->where('id_grupo', $request['evaluaciones'][0]['id_grupo'])
                                    ->where('id_integrante',$request['evaluaciones'][0]['id_integrante'])
                                    ->update([
                                        'ptj_total_indicador'=>$val['puntaje']
                                    ]);
            }

            EvaluacionTotal::where('id_grupo', $request['evaluaciones'][0]['id_grupo'])
            ->where('id_integrante',$request['evaluaciones'][0]['id_integrante'])
            ->update([
                'ptj_total_integrante'=>$request['totalGeneral']
            ]);

            DB::commit();

            return response()->json(['msj' => 'Registros actualizado correctamente', 'code' => 200,'id' => $request['integrante']['id_grupo']]);

        } catch (\Exception $th) {
            return $th;
        }
    }

    public function totalUpdate(Request $request, EvaluacionGrupo $evaluacion_grupo){

        //return $request->all();
        EvaluacionGrupo::where('id_grupo', $request['totales']['id_grupo'])
            ->where('id_evaluacion_total',$request['totales']['id_evaluacion_total'])
            ->update([
                'ptj_total_grupo'=>$request['calcularTotal'],
                'categorias' => $request['totales']['categorias'],
                'revalidar' => $request['totales']['revalidar']
            ]);
        //$evaluacion_grupo->update($request->all());

        return response(['msj' => 'Registro actualizado correctamente', 'code' => 200, 'id' => $request['totales']['id_grupo']]);
    }

}
