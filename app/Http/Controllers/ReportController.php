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
use Barryvdh\DomPDF\Facade\Pdf;


class ReportController extends Controller
{
    public function index()
    {
        // $integrantes = Integrante::with('persona')->get();
        //$grupos = Grupo::with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea','integrante.persona')->get();

        return Inertia::render('Reports/Index',[
            'grupos' =>  Grupo::query()->with('facultad','escuela', 'area_investigacion', 'linea', 'sublinea','integrante.persona','evaluacionGrupos')->orderBy('created_at','DESC')
            ->when(\Illuminate\Support\Facades\Request::input('search'), function($query, $search) {
            $query->where(function ($subquery) use ($search){
                $subquery->wherehas('integrante.persona', function($q) use ($search) {
                    $q->whereRaw("CONCAT(name,' ',first_name,' ',last_name) like ?", ['%'.$search.'%']);
                })->orwhere('name','like','%'.$search.'%');
            });
            })->paginate(10),
            'filters' => \Illuminate\Support\Facades\Request::only(['search']),
        ]);
    }

    public function pdfGrupo(){
        $grupos = Grupo::orderBy('created_at','DESC')->get();
        

        $pdf = Pdf::loadView('report.grupos', compact('grupos'));
        $pdf->setPaper('a4','landscape');
        $pdf->setOption('header-html',view('report.grupos'));
 
        return $pdf->stream('reporte.pdf');
    }
}
