<?php

namespace App\Http\Controllers;

use App\Models\PivotGrupoLinea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PivotGrupoLineaController extends Controller
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
    public function store(Request $request): RedirectResponse
    {
        //return $request->all();
        $registrosActuales = PivotGrupoLinea::where('id_grupo', $request->id_grupo)->count();
        if ($registrosActuales < 3) {
        $pivot = PivotGrupoLinea::create([
            'id_grupo' => $request->id_grupo,
            'id_area'=>$request->id_area,
            'id_linea'=>$request->id_linea,
            'id_sublinea'=>$request->id_sublinea,
            // 'id_facultad'=>$request->id_facultad,
            // 'id_escuela'=>$request->id_escuela,
        ]);
        $pivot->save();
    }else{
        return Redirect::route('ver.grupo', $request->id_grupo)->withErrors(['alert' => 'El máximo de lineas de investigación por grupo es de 3.']);
    }
    
        return Redirect::route('ver.grupo', $request->id_grupo);
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
    public function update(Request $request, PivotGrupoLinea $pivotGrupoLinea)
    {
        $pivotGrupoLinea->update($request->all());

        return Redirect::route('ver.grupo',$request->id_grupo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PivotGrupoLinea $pivotGrupoLinea)
    {
        $grupoId = $pivotGrupoLinea->id_grupo;
        $pivotGrupoLinea->delete();

        return Redirect::route('ver.grupo',['id' => $grupoId]);
    }
}
