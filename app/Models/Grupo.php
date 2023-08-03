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
        'id_facultad',
        'id_escuela',
        'id_integrante'
    ];

    public function linea_investigacion() {
        return $this->belongsTo(LineaInvestigacion::class);
    }

    public function facultad() {
        return $this->belongsTo(Facultad::class);
    }

    public function escuela() {
        return $this->belongsTo(Escuela::class);
    }

    public function integrante() {
        return $this->belongsTo(integrante::class);
    }
}
