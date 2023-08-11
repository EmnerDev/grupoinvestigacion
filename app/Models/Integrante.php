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

    public function grupo(){
        return $this->belongsTo(Grupo::class,'id_grupo');
    }

    public function persona() {
        return $this->belongsTo(Persona::class,'id_persona');
    }
}
