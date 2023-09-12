<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name',
        'puntaje',
        'cantidad',
        'ptj_por_indicador',
        'ptj_total',
        'total',
        'gran_total',
        'id_criterio',
        'id_integrante',
        'id_grupo',
    ];

    public function criterio(){
        return $this->belongsTo(Criterio::class,'id_criterio');
    }

    public function integrante(){
        return $this->belongsTo(Integrante::class,'id_integrante');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class,'id_grupo');
    }
}
