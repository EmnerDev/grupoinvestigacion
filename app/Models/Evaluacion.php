<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'puntaje',
        'id_criterio',
        'id_indicador',
        'id_integrante',
        'id_grupo',
    ];

    public function criterio(){
        return $this->belongsTo(Criterio::class, 'id_criterio');
    }

    public function indicador(){
        return $this->belongsTo(Indicador::class, 'id_indicador');
    }

    public function integrante(){
        return $this->belongsTo(Integrante::class, 'id_integrante');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function evaluacionCriterio(){
        return $this->hasMany(EvaluacionCriterio::class, 'id_evaluacion');
    }
}
