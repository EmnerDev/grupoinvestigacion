<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrantes extends Model
{
    use HasFactory;

    protected $fillabole = [
        'condition',
        'orcid',
        'cti_vitae',
        'google_scholar',
        'id_grupo',
        'id_persona'
    ];

    public function grupos(){
        return $this->belongsTo(Grupo::class);
    }

    public function persona() {
        return $this->belongsTo(Persona::class);
    }
}
