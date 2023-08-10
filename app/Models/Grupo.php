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
        'id_area',
        'id_linea',
        'id_sublinea',
        'id_facultad',
        'id_escuela',
        'id_persona'
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

    public function persona() {
        return $this->belongsTo(Persona::class);
    }
}
