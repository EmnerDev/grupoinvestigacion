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
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $tipos = Tipo::all();
        $personas = Persona::with('user')->get();
        return Inertia::render('Users/Index', [
            'users' => User::with('roles','persona')->paginate(),
            'personas' => $personas,
            'roles' => $roles,
            'tipos' => $tipos
        ]);
    }

    public function store(Request $request) {
       //return $request->all;
        $dni = $request->nameu;

        $persona = Persona::where('dni', $dni)->first();

        if(!$persona) {
            $persona = new Persona();
                $persona->dni = $dni;                
                $persona->phone = $request->phone;

                $id_tipo = $request->input('roles') === 2 ? 1:5;
                $persona->id_tipo = $id_tipo;
        }
        $user = new User();
        $user->name = $request->nameu;
        $user->email = $request->email;
        $user->password = $request->nameu;

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

    public function update(Request $request, User $user)
    {
        //return $request->all();
        //dd($request->all(), $user);
        $request_user['id'] = $request['id'];
        $request_user['name'] = $request['nameu'];
        $request_user['email'] = $request['email'];
        if(isset($request['password'])){
            
            $request_user['password'] = $request['password'];
        }
        if(isset($request['password_confirmation'])){
            
            $request_user['password_confirmation'] = $request['password_confirmation'];
        }
        $user->update($request_user);
        

        $request_person['id'] = $request['person_id'];
        $request_person['dni'] = $request['nameu'];
        $request_person['name'] = $request['name'];
        $request_person['first_name'] = $request['first_name'];
        $request_person['last_name'] = $request['last_name'];
        $request_person['email'] = $request['email'];
        $request_person['user_id'] = $request_user['id'];
        
        $persona = Persona::find($request['person_id']);
        if($request->input('roles') === 2 && $persona->id_tipo !== 1){
            return response()->json(['error' => 'Solo se puede asignar el rol de Coordinador a doncentes nombrados'], 422);
        }
        $role = Role::find($request->input('roles'));

        if($role){
            $user->syncRoles([$role->name]);
        }
        
        $persona->update($request_person);
        
        DB::commit();
        return response()->json(['message' =>'Registro Actualizado correctamente','data'=>$user], 201);

    }

    public function searchUsuario(Request $request,$dni) {
        // $dni = $request->input('dni');
         $persona = Persona::where('dni', $dni)->first();
         return response()->json($persona);
     }

     public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index');
    }
}
