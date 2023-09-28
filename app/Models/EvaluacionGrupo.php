<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionGrupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ptj_total_grupo',
        'id_evaluacion_total',
        'id_grupo',
    ];
}
