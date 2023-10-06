<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoCreateRequest;
use App\Http\Requests\GrupoUpdateRequest;
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
use Illuminate\Support\Facades\Validator;
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
        //$grupos = Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea','integrante.persona')->get();

        return Inertia::render('Groups/Index',[
            'grupos' =>  Grupo::query()->with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea','integrante.persona','evaluacionGrupos')->orderBy('created_at','DESC')
            ->when(\Illuminate\Support\Facades\Request::input('search'), function($query, $search) {
            $query->where(function ($subquery) use ($search){
                $subquery->wherehas('integrante.persona', function($q) use ($search) {
                    $q->whereRaw("CONCAT(name,' ',first_name,' ',last_name) like ?", ['%'.$search.'%']);
                })->orwhere('name','like','%'.$search.'%');
            });
            })->paginate(10),
            //->withQueryString(),
            // 'integrantes' => $integrantes
            'filters' => \Illuminate\Support\Facades\Request::only(['search']),
        ]);

        // $grupos = Grupo::query()->with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea','integrante.persona')->orderBy('created_at','DESC')
        //                         ->when(\Illuminate\Support\Facades\Request::input('search'), function($query, $search) {
        //                         $query->where('name','like','%'.$search.'%');
        //                         })->paginate(6);

        // return Inertia::render('Groups/Index',[
        //     'grupos' =>  $grupos,
        //     'filters' => \Illuminate\Support\Facades\Request::only(['search']),
        //     // 'integrantes' => $integrantes
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $facultades = Facultad::all();
        $escuelas = Escuela::all();
        $areas = AreaInvestigacion::all();
        $lineas = Linea::all();
        $sublineas = SubLinea::all();
        $tipos = Tipo::all();
        $personas = Persona::with('tipo')->where('id_tipo', 1)->get();

        return Inertia::render('Groups/Create',[
            'grupos' => Grupo::paginate(),
            'facultades' => $facultades,
            'escuelas' => $escuelas,
            'areas' => $areas,
            'lineas' => $lineas,
            'sublineas' => $sublineas,
            'personas' => $personas,
            'tipos' => $tipos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoCreateRequest $request)
    {
        // return $request->all();
        try {
            //code...
            // $dni = $request->dni;
    
            // $persona = Persona::where('dni', $dni)->first();
            // if(!$persona) {
            //     return response()->json(['error'=> 'La persona con el DNi proporcionado no existe'], 200);
            // }
    
            $integranteExistente = Integrante::where('id_persona', $request->id_persona)->first();
    
            if($integranteExistente){
                return response()->json(['error' => 'El coordinador ya esta registrado en otro grupo'],422);
                
            }
    
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

            $validator = Validator::make($request->all(), $request->rules());
            if($validator->fails()) {
                return response()->json((['errors'=> $validator->errors()]), 422);
            }
            //return Redirect::route('ver.grupo',$grupo);
            return response()->json(['msj' =>'Registro creado correctamente','code' =>200,'data'=>$grupo, 'id' => $grupo->id]);
            //return redirect()->route('ver.grupo', $grupo)->with(['msj' =>'Registro creado correctamente','data' => $grupo]);
        } catch (\Throwable $th) {
            throw $th;
        }

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
        $facultades = Facultad::all();
        $escuelas = Escuela::all();
        $areas = AreaInvestigacion::all();
        $lineas = Linea::all();
        $sublineas = SubLinea::all();
        $tipos = Tipo::all();
        $personas = Persona::with('tipo')->where('id_tipo', 1)->get();

        return Inertia::render('Groups/Edit',[
            'grupos' =>$grupo,
            'facultades' => $facultades,
            'escuelas' => $escuelas,
            'areas' => $areas,
            'lineas' => $lineas,
            'sublineas' => $sublineas,
            'personas' => $personas,
            'tipos' => $tipos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrupoUpdateRequest $request, Grupo $grupo): RedirectResponse
    {
        $grupo->update($request->all());

        if($request->has('integrantes')) {
            foreach($request->input('integrantes') as $integranteData){
                $integrante = Integrante::find($integranteData['id']);
                $integrante->update($integranteData);
            }
        }
        
        return Redirect::route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {   
        $grupo->integrante()->delete();
        $grupo->evaluacion()->delete();
        $grupo->evaluacionCriterio()->delete();
        $grupo->evaluacionTotal()->delete();
        $grupo->evaluacionGrupos()->delete();
        $grupo->delete();
        return Redirect::route('grupos.index');
    }

    public function verGrupo($id){
        $integrantes = Integrante::with('persona')->where('id_grupo',$id)->get();
        //$personas = Persona::get();
        //$persoObje = collect($personas)->all();
        //dd($persoObje);
        return Inertia::render('Groups/Show',[
            'grupos' => Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea')->find($id),
            'integrantes' => $integrantes,
            'condition' =>Integrante::enumConditionOption(),
            //'personas' => $personas
        ]);
    }

    public function searchIntegrante(Request $request,$dni) {
       // $dni = $request->input('dni');
        $persona = Persona::where('dni', $dni)->first();
        return response()->json($persona);
    }
}
