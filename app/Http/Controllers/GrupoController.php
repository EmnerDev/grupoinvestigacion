<?php

namespace App\Http\Controllers;

use App\Models\AreaInvestigacion;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\Grupo;
use App\Models\Integrante;
use App\Models\Linea;
use App\Models\Persona;
use App\Models\SubLinea;
use App\Models\Tipo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $integrantes = Integrante::with('persona')->get();      
        $grupos = Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea','integrante.persona')->get();

        return Inertia::render('Groups/Index',[
            'grupos' =>  $grupos,                     
            // 'integrantes' => $integrantes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $facultad = Facultad::all();
        $escuela = Escuela::all();
        $area = AreaInvestigacion::all();
        $linea = Linea::all();
        $sublinea = SubLinea::all();
        $tipos = Tipo::all();
        $personas = Persona::with('tipo')->get();        

        return Inertia::render('Groups/Create',[
            'grupos' => Grupo::paginate(),
            'facultad' => $facultad,
            'escuela' => $escuela,
            'area' => $area,
            'linea' => $linea,
            'sublinea' => $sublinea,
            'personas' => $personas,
            'tipos' => $tipos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $grupo = new Grupo;
        $grupo->name = $request->name;
        $grupo->space_inves = $request->space_inves;
        $grupo->pre_group_inv = $request->pre_group_inv;
        $grupo->objective = $request->objective;
        $grupo->obj_desa_soste_l_i = $request->obj_desa_soste_l_i;
        $grupo->services = $request->services;
        $grupo->laboratory = $request->laboratory;
        $grupo->phisical_environment= $request->phisical_environment;
        $grupo->labora_equip = $request->labora_equip;
        $grupo->pagina = $request->pagina;
        $grupo->office = $request->office;
        $grupo->annexed = $request->annexed;
        $grupo->phone = $request->phone;
        $grupo->id_area = $request->id_area;
        $grupo->id_linea = $request->id_linea;
        $grupo->id_sublinea = $request->id_sublinea;
        $grupo->id_facultad = $request->id_facultad;
        $grupo->id_escuela = $request->id_escuela;       
        $grupo->save();

        $integrante = Integrante::create([
                'id_grupo' => $grupo->id,
                'id_persona' => $request->id_persona

        ]);
        $integrante->save();
        DB::commit();
        return Redirect::route('ver.grupo',$grupo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {        
        // $integrantes = Integrante::with('persona');      

        // return Inertia::render('Groups/Show',[
        //     'grupos' => Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea')->find($grupo),            
        //     'integrantes' => $integrantes
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        //
    }

    public function verGrupo($id){
        $integrantes = Integrante::with('persona')->where('id_grupo',$id)->get();      

        return Inertia::render('Groups/Show',[
            'grupos' => Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea')->find($id),            
            'integrantes' => $integrantes,
            'condition' =>Integrante::enumConditionOption()
        ]);
    }
}
