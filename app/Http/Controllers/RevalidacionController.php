<?php

namespace App\Http\Controllers;

use App\Models\Revalidacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RevalidacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();
        if ($request->file('file_revalidacion')) {
            $file = $request->file('file_revalidacion');
            $nombreRevalidacion = $file->getClientOriginalName();
            $nombreLimpioRevalidacion = Str::slug(pathinfo($nombreRevalidacion, PATHINFO_FILENAME));
            $extensionRevalidacion = $file->getClientOriginalExtension();

            $nombreFinalrevalidacion= $nombreLimpioRevalidacion . '.' . $extensionRevalidacion;

            $pathPlanTrabajo = $request->root().'/storage/'.$file->storeAs('/grupos/grupo_'.$request->id_grupo.'/'.$request->input('file_revalidacion'), $nombreFinalrevalidacion,'public');
        }
        $files = Revalidacion::where('id_grupo', $request->id_grupo)->first();

        $files = Revalidacion::create([
            'id_grupo' => $request->id_grupo,
            'file_revalidacion' =>isset($pathPlanTrabajo) ? $pathPlanTrabajo:'',
            'name_revalidacion' =>$nombreFinalrevalidacion,
        ]);

        $files->save();

        return response()->json(['msj' =>'Registro creado correctamente','code' =>200,'data'=>$files, 'id' => $request->id_grupo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //return $request->all();
        $revalidacion_id = $request['revalidacion_id'];
        unset($request['revalidacion_id']);


        if ($request->file('file_revalidacion')) {
            $file = $request->file('file_revalidacion');
            $nombreRevalidacion = $file->getClientOriginalName();
            $nombreLimpioRevalidacion = Str::slug(pathinfo($nombreRevalidacion, PATHINFO_FILENAME));
            $extensionRevalidacion = $file->getClientOriginalExtension();

            $nombreFinalrevalidacion= $nombreLimpioRevalidacion . '.' . $extensionRevalidacion;

            $pathPlanTrabajo = $request->root().'/storage/'.$file->storeAs('/grupos/grupo_'.$request->id_grupo.'/'.$request->input('file_revalidacion'), $nombreFinalrevalidacion,'public');
        }
        $files = Revalidacion::find($revalidacion_id);

        if(isset($files)){
        $files->update([
            'id_grupo' => $request->id_grupo,
            'file_revalidacion' =>isset($pathPlanTrabajo) ? $pathPlanTrabajo:'',
            'name_revalidacion' =>$nombreFinalrevalidacion,
        ]);
    }   

        return response()->json(['msj' =>'Registro Actualizado correctamente','code' =>200,'data'=>$files, 'id' => $request->id_grupo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
