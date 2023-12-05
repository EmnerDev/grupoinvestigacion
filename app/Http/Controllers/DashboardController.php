<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalDocentenombrado = Persona::with('tipo')->where('id_tipo', 1)->count();

        $totalDocenteAnterior = Persona::with('tipo')->where('id_tipo', 1)
        ->whereMonth('created_at', now()
        ->subMonth()->month())->count();

        $totalDocenteContratado = Persona::with('tipo')->where('id_tipo',2)->count();

        $totalGrupo = Grupo::count();
        return Inertia::render('Dashboard',[
            'totalDocentesNombrados' => $totalDocentenombrado,
            'totalDocentesAnterior' => $totalDocenteAnterior,
            'totalDocentesContratados' => $totalDocenteContratado,
            'totalGrupos' => $totalGrupo,
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getGrupoCreado(){
        // $groupData = Grupo::whereYear('created_at', now()->year)
        // ->orWhereYear('created_at', now()->subYear()->year)->get();

        // $labels = $groupData->pluck('created_at')->map(fn ($date)=> $date->format('F'))->toArray();
        // $dataCurrentYear = $groupData->whereYear('created_at', now()->year)->pluck('cantidad');
        // $dataPreviousYear = $groupData->whereYear('created_at', now()->subYear()->year)->pluck('cantidad');

        $groupData = Grupo::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as cantidad')
        )
        ->whereRaw('YEAR(created_at) >= ?', [now()->subYear()->year])
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();
    
        $labels = $groupData->map(fn ($data) => date('F', mktime(0, 0, 0, $data->month, 1)))->toArray();
        $dataCurrentYear = $groupData->pluck('cantidad')->toArray();
    
        // Obtener datos del año anterior
        $groupDataPreviousYear = Grupo::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as cantidad')
        )
        ->whereRaw('YEAR(created_at) = ?', [now()->subYear()->subYear()->year])
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();
    
        $dataPreviousYear = $groupDataPreviousYear->pluck('cantidad')->toArray();
        return response()->json(['labels' => $labels, 'dataCurrentYear' => $dataCurrentYear, 'dataPreviousYear' => $dataPreviousYear]);
    }
}
