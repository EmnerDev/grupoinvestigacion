<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'id_area'
    ];

    public function area_investigacion(){
        return $this->belongsTo(AreaInvestigacion::class);
    }

    public function sublinea(){
        return $this->belongsTo(SubLinea::class);
    }

    public function grupo(){
        return $this->hasMany(Grupo::class, 'id_linea');
    }
}
