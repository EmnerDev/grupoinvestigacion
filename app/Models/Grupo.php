<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'space_inves',
        'pre_group_inv',
        'objective',
        'line_inv',
        'obj_desa_soste_l_i',
        'services',
        'laboratory',
        'phisical_environment',
        'labora_equip',
        'pagina',
        'office',
        'annexed',
        'phone',
        'puntaje_total',
        'categorias',
        'id_area',
        'id_linea',
        'id_sublinea',
        'id_facultad',
        'id_escuela'
    ];

    public function area_investigacion() {
        return $this->belongsTo(AreaInvestigacion::class,'id_area');
    }

    public function linea(){
        return $this->belongsTo(Linea::class,'id_linea');
    }

    public function sublinea(){
        return $this->belongsTo(SubLinea::class, 'id_sublinea');
    }

    public function facultad() {
        return $this->belongsTo(Facultad::class,'id_facultad');
    }

    public function escuela() {
        return $this->belongsTo(Escuela::class,'id_escuela');
    }

    public function integrante() {
        return $this->hasMany(Integrante::class,'id_grupo');
    }

    public function evaluacion() {
        return $this->hasMany(Evaluacion::class, 'id_grupo');
    }

    public function evaluacionCriterio(){
        return $this->hasMany(EvaluacionCriterio::class, 'id_grupo');
    }

    public function evaluacionTotal(){
        return $this->hasMany(EvaluacionTotal::class, 'id_grupo');
    }

    public function evaluacionGrupos(){
        return $this->hasMany(EvaluacionGrupo::class,'id_grupo', 'id');
    }
}

