<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ptj_max_criterio',
        'ptj_min_criterio',
    ];

    public function indicador(){
        return $this->hasMany(Indicador::class,'id_criterio');
    }

    public function evaluacion(){
        return $this->hasMany(Evaluacion::class, 'id_criterio');
    }

    public function evaluacionCriterio(){
        return $this->hasMany(EvaluacionCriterio::class, 'id_criterio');
    }
}
