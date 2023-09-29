<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvaluacionGrupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ptj_total_grupo',
        'categorias',
        'id_evaluacion_total',
        'id_grupo',
    ];

    public function evaluacionTotal(){
        return $this->belongsTo(EvaluacionTotal::class, 'id_evaluacion_total');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class,'id_grupo');
    }

    public static function enumCategoriaOption() {
        return [
            'CONSOLIDADO' => 'CONSOLIDADO',
            'POR CONSOLIDAR' => 'POR CONSOLIDAR',
            'EMERGENTE' => 'EMERGENTE',
            'SIN EVALUAR' => 'SIN EVALUAR'
        ];
    }
}
