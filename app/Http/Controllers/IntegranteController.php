<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Integrante;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
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
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            
            $dni = $request->dni;

            $persona = Persona::where('dni', $dni)->first();
            
            
            if(!$persona) {
                $persona = new Persona();
                $persona->dni = $dni;            
                $persona->id_tipo = 4;
                // $persona->user_id = $request->user_id ?? null;
            }
            $integranteExistente = Integrante::where('id_persona', $persona->id)->first();
            $maxGruposPermitidos = ($persona->tipo->name === 'Docente Nombrado') ? 1 : 2;
    
            $cantidadGrupoPorPersona = $persona->integrante->count();
    
            if($cantidadGrupoPorPersona >= $maxGruposPermitidos){
        
                return response()->json(['error' => 'El integrante ya esta registrado en otro grupo'], 422);
            } 

            if($persona->user && $persona->user->roles->isNotEmpty()){

                $rolUser = $persona->user->roles->first()->name;
                if($rolUser === 'Coordinador'){
                    return response()->json(['error' => 'Un coordinador no puede agregarse al grupo'], 422);
                }
            }
            $persona->name = $request->name;
            $persona->first_name = $request->first_name;
            $persona->last_name = $request->last_name;
            $persona->phone = $request->phone;
            $persona->email = $request->email;
            $persona->save();
    
            $integrante = new Integrante();
            $integrante->condition = $request->condition;
            $integrante->orcid = $request->orcid;
            $integrante->cti_vitae = $request->cti_vitae;
            $integrante->google_scholar = $request->google_scholar;
            $integrante->id_grupo = $request->input('id_grupo');
            $integrante->id_persona = $persona->id;
            $integrante->save();
    
            //return redirect()->route('ver.grupo',$request->id_grupo);
            $integrantes = Integrante::with('persona')->where('id_grupo',$request->id_grupo)->get();
    
            return response()->json(['message' =>'Registro creado correctamente',$integrante,'data'=>$integrantes], 201);
        } catch (\Throwable $th) {
            return $th;
        }
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
    public function update(Request $request, Integrante $integrante, Grupo $grupo)
    {
        $integrante->update($request->all());
        //return Redirect::route('ver.grupo',$request->id_grupo);
        $integrantes = Integrante::with('persona')->where('id_grupo',$request->id_grupo)->get();

        return response()->json(['message' =>'Registro Actualizado correctamente',$integrante,'data'=>$integrantes], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Integrante $integrante)
    {
        $grupoId = $integrante->id_grupo;
        $integrante->delete();

        return Redirect::route('ver.grupo',['id' => $grupoId]);
    }
}
