<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotGrupoLinea extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_grupo',
        'id_area',
        'id_linea',
        'id_sublinea',
        'id_facultad',
        'id_escuela'
    ];

    public function grupo() {
        return $this->belongsTo(Grupo::class,'id_grupo');
    }

    public function area_investigacion() {
        return $this->belongsTo(AreaInvestigacion::class,'id_area');
    }

    public function linea(){
        return $this->belongsTo(Linea::class,'id_linea','id');
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
        
}
