<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\Persona;
use App\Models\Tipo;
use App\Models\User;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $tipos = Tipo::all();
        $integrantes = Integrante::with('persona')->where('condition', 'Coordinador')->get();
        return Inertia::render('Users/Index', [
            'users' => User::with('roles','persona')->paginate(),
            'integrantes' => $integrantes,
            'roles' => $roles,
            'tipos' => $tipos
        ]);
    }

    public function store(Request $request,User $user) {
       //return $request->all;
        $dni = $request->dni;

        $persona = Persona::where('dni', $dni)->first();

        if(!$persona) {
            $persona = new Persona();
                $persona->dni = $dni;                
                $persona->phone = $request->phone;

                $id_tipo = $request->input('roles') === 2 ? 1:5;
                $persona->id_tipo = $id_tipo;
        }
        $user = new User();
        $user->name = $request->dni;
        $user->email = $request->email;
        $user->password = $request->dni;

        if($request->input('roles') === 2 && $persona->id_tipo !== 1){
            return response()->json(['error' => 'Solo se puede asignar el rol de Coordinador a doncentes nombrados'], 422);

        }
        $user->assignRole($request->input('roles'));
        $user->save();

        $persona->name = $request->name;
        $persona->first_name = $request->first_name;
        $persona->last_name = $request->last_name;
        $persona->email = $request->email;
        $persona->user_id = $user->id;
        $persona->save();

        DB::commit();
        
        //return $user;
        return response()->json(['message' =>'Usuario creado correctamente',$user,'data'=>$user], 201);

    }

    public function searchUsuario(Request $request,$dni) {
        // $dni = $request->input('dni');
         $persona = Persona::where('dni', $dni)->first();
         return response()->json($persona);
     }
}
