<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionCriterio extends Model
{
    use HasFactory;

    protected $fillable = [
        'ptj_total_indicador',
        'id_evaluacion',
        'id_criterio',
        'id_integrante',
        'id_grupo',
    ];

    public function evaluacion(){
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion');
    }

    public function criterio(){
        return $this->belongsTo(Criterio::class, 'id_criterio');
    }

    public function integrante(){
        return $this->belongsTo(Integrante::class, 'id_integrante');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function evaluacionTotal(){
        return $this->hasMany(EvaluacionTotal::class, 'id_evaluacion_criterio');
    }
}
