<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionTotal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ptj_total',
        'id_evaluacion_criterio',
        'id_grupo',
    ];

    public function evaluacionCriterio(){
        return $this->belongsTo(EvaluacionCriterio::class, 'id_evaluacion_criterio');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }
}
