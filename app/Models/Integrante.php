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
        return $this->belongsTo(Persona::class,'id_persona', 'id');
    }

    public function evaluacion(){
        return $this->hasMany(Evaluacion::class, 'id_integrante', 'id');
    }

    public function evaluacionCriterio(){
        return $this->hasMany(EvaluacionCriterio::class, 'id_integrante','id');
    }

    public function evaluacionTotal() {
        return $this->hasMany(EvaluacionTotal::class, 'id_integrante');
    }

    public static function enumConditionOption() {
        return [
            'Investigador Titular' => 'Investigador Titular',
            'Investigador Colaborador' => 'Investigador Colaborador',
            'Investigador En formacion' => 'Investigador En formacion',
            'Investigador Posdoctorado' => 'Investigador Posdoctorado',
            'Coordinador' => 'Coordinador'
        ];
    }
}
