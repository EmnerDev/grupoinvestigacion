<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionTotal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ptj_total_integrante',
        'id_evaluacion_criterio',
        'id_grupo',
        'id_integrante'
    ];

    public function evaluacionCriterio(){
        return $this->belongsTo(EvaluacionCriterio::class, 'id_evaluacion_criterio');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function integrante(){
        return $this->belongsTo(Integrante::class, 'id_integrante');
    }
    public function evaluacionGrupos(){
        return $this->hasMany(EvaluacionGrupo::class,'id_evaluacion_total','id');
    }
}
