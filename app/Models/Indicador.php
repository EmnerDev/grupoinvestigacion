<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name',
        'ptj_por_indicador',
        'ptj_max_indicador',
        'id_criterio',
    ];

    public function criterio(){
        return $this->belongsTo(Criterio::class,'id_criterio');
    }

    public function evaluacion(){
        return $this->hasMany(Evaluacion::class, 'id_indicador');
    }

}
