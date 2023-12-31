<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoCreateRequest;
use App\Http\Requests\GrupoUpdateRequest;
use App\Models\AreaInvestigacion;
use App\Models\Escuela;
use App\Models\Facultad;
use App\Models\File;
use App\Models\Grupo;
use App\Models\Integrante;
use App\Models\Linea;
use App\Models\Persona;
use App\Models\PivotGrupoLinea;
use App\Models\Programacion;
use App\Models\Revalidacion;
use App\Models\SubLinea;
use App\Models\Tipo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $integrantes = Integrante::with('persona')->get();
        //$grupos = Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea','integrante.persona')->get();
        $user = auth()->user();

    if($user->roles->pluck('name')->contains('Coordinador') || $user->roles->pluck('name')->contains('Integrante')) {
        $coordinadorId = $user->persona->id;

        $grupos = Grupo::query()
        ->with('facultad','escuela','integrante.persona','evaluacionGrupos','pivotGrupoLinea','pivotGrupoLinea','pivotGrupoLinea.area_investigacion', 'pivotGrupoLinea.linea', 'pivotGrupoLinea.sublinea')
        ->orderBy('created_at','DESC')
        ->whereHas('integrante.persona', function ($query) use ($coordinadorId){
            $query->where('id', $coordinadorId);
        })
        ->paginate();
        //return $grupos;
        $pivotLinea = PivotGrupoLinea::with( 'area_investigacion', 'linea', 'sublinea')->get();

        return Inertia::render('Groups/Index', [
            'grupos' => $grupos,
            'programacions' => Programacion::get(),
            'pivotLineas' => $pivotLinea
        ]);
    }

        return Inertia::render('Groups/Index',[
            'grupos' =>  Grupo::query()->with('facultad','escuela','integrante.persona','evaluacionGrupos','pivotGrupoLinea','pivotGrupoLinea.area_investigacion', 'pivotGrupoLinea.linea', 'pivotGrupoLinea.sublinea')->orderBy('created_at','ASC')
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
            'programacions' => Programacion::get(),
            'pivotLineas' => PivotGrupoLinea::with( 'area_investigacion', 'linea', 'sublinea')->get()
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
        $user =auth()->user();
        return Inertia::render('Groups/Create',[
            'grupos' => Grupo::paginate(),
            'facultades' => $facultades,
            'escuelas' => $escuelas,
            'areas' => $areas,
            'lineas' => $lineas,
            'sublineas' => $sublineas,
            'personas' => $personas,
            'tipos' => $tipos,
            'users' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoCreateRequest $request)
    {
        //return $request->all();
        try {
            $user = auth()->user();

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
            // $grupo->id_area = $request->id_area;
            // $grupo->id_linea = $request->id_linea;
            // $grupo->id_sublinea = $request->id_sublinea;
            $grupo->id_facultad = $request->id_facultad;
            $grupo->id_escuela = $request->id_escuela;
            $grupo->save();

            if($user->roles->pluck('name')->contains('Administrador')) {
                $integrante = Integrante::create([
                    'id_grupo' => $grupo->id,
                    'id_persona' => $request->id_persona

            ]);
            }else {
                $integrante = Integrante::create([
                    'id_grupo' => $grupo->id,
                    'id_persona' => $request->id_person,

            ]);
            }

            $integrante->save();

            $pivot = PivotGrupoLinea::create([
                'id_grupo' => $grupo->id,
                'id_area'=>$request->id_area,
                'id_linea'=>$request->id_linea,
                'id_sublinea'=>$request->id_sublinea,
                // 'id_facultad'=>$request->id_facultad,
                // 'id_escuela'=>$request->id_escuela,
            ]);
            $pivot->save();

            if ($request->file('plan_trabajo')) {
                $file = $request->file('plan_trabajo');
                $nombrePlanTrabajo = $file->getClientOriginalName();
                $nombreLimpioPlanTrabajo = Str::slug(pathinfo($nombrePlanTrabajo, PATHINFO_FILENAME));
                $extensionPlanTrabajo = $file->getClientOriginalExtension();

                $nombreFinalPlanTrabajo = $nombreLimpioPlanTrabajo . '.' . $extensionPlanTrabajo;

                $pathPlanTrabajo = $request->root().'/storage/'.$file->storeAs('/grupos/grupo_'.$grupo->id.'/'.$request->input('plan_trabajo'), $nombreFinalPlanTrabajo,'public');
            }
            if ($request->file('anexo')) {
                $file = $request->file('anexo');
                $nombreAnexo = $file->getClientOriginalName();
                $nombreLimpioAnexo  = Str::slug(pathinfo($nombreAnexo, PATHINFO_FILENAME));
                $extensionAnexo = $file->getClientOriginalExtension();
                $nombreFinalAnexo = $nombreLimpioAnexo . '.' . $extensionAnexo;

                $pathAnexo = $request->root().'/storage/'.$file->storeAs('/grupos/grupo_'.$grupo->id.'/'.$request->input('anexo'), $nombreFinalAnexo,'public');
            }
            $files = File::create([
                'id_grupo' => $grupo->id,
                'plan_trabajo' =>isset($pathPlanTrabajo) ? $pathPlanTrabajo:'',
                'anexo' =>isset($pathAnexo) ? $pathAnexo:'',
            ]);

            $files->save();

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
        $user =auth()->user();
        $facultades = Facultad::all();
        $escuelas = Escuela::all();
        $areas = AreaInvestigacion::all();
        $lineas = Linea::all();
        $sublineas = SubLinea::all();
        $tipos = Tipo::all();
        $personas = Persona::with('tipo')->where('id_tipo', 1)->get();

        $integrante = Integrante::where('id_grupo', $grupo->id)->first();
        $file = Integrante::where('id_grupo', $grupo->id)->first();
       
        return Inertia::render('Groups/Edit',[
            'grupos' =>$grupo,
            'facultades' => $facultades,
            'escuelas' => $escuelas,
            'areas' => $areas,
            'lineas' => $lineas,
            'sublineas' => $sublineas,
            'personas' => $personas,
            'tipos' => $tipos,
            'users' => $user,
            'integrante' => $integrante,
            'file' => $file
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, Grupo $grupo)
    public function update(Request $request)
    {
        //return $request->all();

        //return $request->input('integrantes');
        $user = auth()->user();
        $grupo_id = $request['grupo_id'];
        unset($request['grupo_id']);

        $grupo = Grupo::find($grupo_id);
        $grupo->update($request->all());

        $integrante = Integrante::where('id_grupo',$grupo->id)->first();

        if(isset($integrante)){

            $integrante->update([
                'id_grupo' => $grupo->id,
                'id_persona' => $request->id_persona,
            ]);
        }

        if ($request->file('plan_trabajo')) {
            $file = $request->file('plan_trabajo');
            $nombrePlanTrabajo = $file->getClientOriginalName();
            $nombreLimpioPlanTrabajo = Str::slug(pathinfo($nombrePlanTrabajo, PATHINFO_FILENAME));
            $extensionPlanTrabajo = $file->getClientOriginalExtension();

            $nombreFinalPlanTrabajo = $nombreLimpioPlanTrabajo . '.' . $extensionPlanTrabajo;

            $pathPlanTrabajo = $request->root().'/storage/'.$file->storeAs('/grupos/grupo_'.$grupo->id.'/'.$request->input('plan_trabajo'), $nombreFinalPlanTrabajo,'public');
        }
        if ($request->file('anexo')) {
            $file = $request->file('anexo');
            $nombreAnexo = $file->getClientOriginalName();
            $nombreLimpioAnexo  = Str::slug(pathinfo($nombreAnexo, PATHINFO_FILENAME));
            $extensionAnexo = $file->getClientOriginalExtension();
            $nombreFinalAnexo = $nombreLimpioAnexo . '.' . $extensionAnexo;

            $pathAnexo = $request->root().'/storage/'.$file->storeAs('/grupos/grupo_'.$grupo->id.'/'.$request->input('anexo'), $nombreFinalAnexo,'public');
        }

        //return $pathAnexo;
        $files = File::where('id_grupo', $grupo->id)->first();

        if(isset($files)){
            $files->update([
                'id_grupo' => $grupo->id,
                'plan_trabajo' =>isset($pathPlanTrabajo) ? $pathPlanTrabajo:'',
                'anexo' =>isset($pathAnexo) ? $pathAnexo:'',     
    
            ]);
        }else{
            File::create([
                'id_grupo' => $grupo->id,
                'plan_trabajo' =>isset($pathPlanTrabajo) ? $pathPlanTrabajo:'',
                'anexo' =>isset($pathAnexo) ? $pathAnexo:'',              
    
            ]);
        }


        return response()->json(['msj' =>'Registro Actualizado correctamente','code' =>200,'data'=>$grupo, 'id' => $grupo->id]);
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
        $pivotLinea = PivotGrupoLinea::with( 'area_investigacion', 'linea', 'sublinea')->where('id_grupo',$id)->get();
        $areas = AreaInvestigacion::all();
        $lineas = Linea::all();
        $sublineas = SubLinea::all();

        $file = File::where('id_grupo', $id)->first();
        $file_revalidacion = Revalidacion::where('id_grupo', $id)->first();
        //$personas = Persona::get();
        //$persoObje = collect($personas)->all();
        //dd($persoObje);
        return Inertia::render('Groups/Show',[
            'grupos' => Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea', 'pivotGrupoLinea', 'revalidacion')->find($id),
            'integrantes' => $integrantes,
            'condition' =>Integrante::enumConditionOption(),
            'programacions' => Programacion::get(),
            'pivotLineas' => $pivotLinea,
            'roles' => Role::get(),
            'areas' => $areas,
            'lineas' => $lineas,
            'sublineas' => $sublineas,
            'file' => $file,
            'revalidacion' => $file_revalidacion
            //'personas' => $personas
        ]);
    }

    public function searchIntegrante(Request $request,$dni) {
       // $dni = $request->input('dni');
        $persona = Persona::where('dni', $dni)->first();
        return response()->json($persona);
    }
}
