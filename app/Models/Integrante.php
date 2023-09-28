<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition',
        'orcid',
        'cti_vitae',
        'google_scholar',
        'id_grupo',
        'id_persona'
    ];

    protected $enumCondition = [
        'inv. Titular' => 'inv. Titular',
        'Inv. Colaborador' => 'Inv. Colaborador',
        'Inv. En formacion' => 'Inv. En formacion',
        'Inv. Posdoctorado' => 'Inv. Posdoctorado',
        'Coordinador' => 'Coordinador'
    ];

    public function grupo(){
        return $this->belongsTo(Grupo::class,'id_grupo');
    }

    public function persona() {
        return $this->belongsTo(Persona::class,'id_persona');
    }

    public function evaluacion(){
        return $this->hasMany(Evaluacion::class. 'id_integrante');
    }

    public function evaluacionCriterio(){
        return $this->hasMany(EvaluacionCriterio::class, 'id_integrante','id');
    }

    public static function enumConditionOption() {
        return [
            'inv. Titular' => 'inv. Titular',
            'Inv. Colaborador' => 'Inv. Colaborador',
            'Inv. En formacion' => 'Inv. En formacion',
            'Inv. Posdoctorado' => 'Inv. Posdoctorado',
            'Coordinador' => 'Coordinador'
        ];
    }
}
