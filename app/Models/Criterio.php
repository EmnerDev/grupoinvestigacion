<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'puntaje_total_criterio',
        'puntaje_total',
        'id_integrante',
        'id_grupo',
    ];

    public function integrante(){
        return $this->belongsTo(Integrante::class, 'id_integrante');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function indicador(){
        return $this->hasMany(Indicador::class,'id_criterio');
    }
}
