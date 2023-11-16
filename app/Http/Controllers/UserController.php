<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $integrantes = Integrante::with('persona')->where('condition', 'Coordinador')->get();
        return Inertia::render('Users/Index', [
            'users' => User::with('roles')->paginate(),
            'integrantes' => $integrantes,
            'roles' => $roles
        ]);
    }

    public function store(Request $request,User $user) {
       //return $request['coordinador']['persona']['name'];
       //return $request->all;
       
       $user = User::create([
           'dni' => $request['coordinador']['persona']['dni'],
           'name' => $request['coordinador']['persona']['name'],
           'first_name' => $request['coordinador']['persona']['first_name'],
           'last_name' => $request['coordinador']['persona']['last_name'],
           'email' => $request['coordinador']['persona']['email'],
           'password' => $request['coordinador']['persona']['dni']
        ]);
        $user->assignRole($request->input('roles'));
        $user->save();
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
