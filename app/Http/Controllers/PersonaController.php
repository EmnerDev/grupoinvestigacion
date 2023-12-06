<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonaCreateRequest;
use App\Http\Requests\PersonaUpdateRequest;
use App\Models\Persona;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();
        $users = User::with('roles')->get();
        // $personas = Persona::with('tipo')->orderBy('created_at','DESC')->query()->when(Request::input('search'), function ($query, $search)
        // {
        //     $query->where('name', 'like', '%'.$search.'%')->orWhere('dni', 'like', '%'.$search.'%');
        // })->paginate(8)->withQueryString();
                
        return Inertia::render('People/Index', [
            'personas' => Persona::query()->with('tipo','user')->orderBy('created_at','DESC')
            ->when(\Illuminate\Support\Facades\Request::input('search'),function($query, $search) {
                $query->whereRaw("CONCAT(name,' ',first_name,' ',last_name) like ?", ['%'.$search.'%'])
                ->OrWhere('dni','like','%'.$search.'%')
                ->OrWhere('first_name','like','%'.$search.'%')
                ->OrWhere('last_name','like','%'.$search.'%');
            })->paginate(6)
            ->withQueryString(),
            'filters' => \Illuminate\Support\Facades\Request::only(['search']),
            'tipos' => $tipos,
            'users' => $users
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('People/Index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonaCreateRequest $request): RedirectResponse
    {
        //return $request->all();
        //dd($request->all());

        $persona = Persona::create([
            'dni' => $request->dni,
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'id_tipo' => $request->id_tipo,
        ]);
        $persona->save();

        return Redirect::route('personas.index')->with('ok', 'ok');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        $lista = Persona::with('tipo')->where('id_tipo', 1)->paginate(10);
        $contratado = Persona::with('tipo')->where('id_tipo', 2)->paginate(10);
        $tipos = Tipo::all();
        return Inertia::render('People/List', [
            'personas' => $lista,
            'contratados' => $contratado,
            'tipos' => $tipos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonaUpdateRequest $request, Persona $persona):RedirectResponse
    {
        $persona->update($request->all());
        return Redirect::route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return Redirect::route('personas.index');
    }
}
