<?php

namespace App\Http\Controllers;

use App\Models\Programacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProgramacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Programacion/Index', [
            'programacions' => Programacion::paginate(),
            'condiciones' => Programacion::enumPrograminOption()

        ]);
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
        //return $request->all();
       $programacion = Programacion::create([
       'year'=>$request->year,
       'programin_type'=>$request->programin_type,
       'start_date'=>$request->start_date,
       'end_date'=>$request->end_date,
       'description'=>$request->description,
       'status'=>$request->status,
       ]);       
       $programacion->save();

       return Redirect::route('ver.programacion')->with('ok', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programacion $programacion):RedirectResponse
    {
        $programacion->update($request->all());
        return Redirect::route('ver.programacion')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programacion $programacion):RedirectResponse
    {
        $programacion->delete();
        return Redirect::route('ver.programacion')->with('ok', 'ok');;
    }
}
