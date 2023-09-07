<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Integrante;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class IntegranteController extends Controller
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
        //dd($request->all());
        $dni = $request->dni;

        $persona = Persona::where('dni', $dni)->first();

        if(!$persona) {
            $persona = new Persona();
            $persona->dni = $dni;
        }
        $integranteExistente = Integrante::where('id_persona', $persona->id)->first();

        if($integranteExistente){
            return redirect()->back()->with('error', 'El integrante ya esta registrado en otro grupo');
        }
        $persona->name = $request->name;
        $persona->first_name = $request->first_name;
        $persona->last_name = $request->last_name;
        $persona->phone = $request->phone;
        $persona->email = $request->email;
        $persona->id_tipo = 4;
        $persona->save();

        $integrante = new Integrante();
        $integrante->condition = $request->condition;
        $integrante->orcid = $request->orcid;
        $integrante->cti_vitae = $request->cti_vitae;
        $integrante->google_scholar = $request->google_scholar;
        $integrante->id_grupo = $request->input('id_grupo');
        $integrante->id_persona = $persona->id;
        $integrante->save();

        return Redirect::route('ver.grupo',$request->id_grupo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Integrante $integrantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Integrante $integrantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Integrante $integrante, Grupo $grupo): RedirectResponse
    {
        $integrante->update($request->all());
        return Redirect::route('ver.grupo',$request->id_grupo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Integrante $integrantes)
    {
        //
    }
}
