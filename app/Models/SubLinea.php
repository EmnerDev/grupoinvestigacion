<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLinea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id_area', 'id_linea'
    ];

    public function area_investigacion(){
        return $this->belongsTo(AreaInvestigacion::class);
    }

    public function linea(){
        return $this->belongsTo(Linea::class);
    }

    public function grupo(){
        return $this->hasMany(Grupo::class,'id_sublinea');
    }

    public function pivotGrupoLinea() {
        return $this->hasMany(PivotGrupoLinea::class,'id_grupo');
    }
}
