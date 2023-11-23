<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\Persona;
use App\Models\Tipo;
use App\Models\User;
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
       //return $request['coordinador']['persona']['name'];
       //return $request->all;
       
        $user = new User();
        $user->name = $request->dni;
        $user->email = $request->email;
        $user->password = $request->dni;
        $user->assignRole($request->input('roles'));
        $user->save();

        $persona = Persona::create([
            'dni' => $request->dni,
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name, 
            'email' => $request->email,  
            'id_tipo' =>1,  
            'user_id' => $user->id,  
        ]);
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
