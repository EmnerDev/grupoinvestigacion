<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaInvestigacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function grupo(){
        return $this->hasMany(Grupo::class,'id_area');
    }

    public function linea(){
        return $this->belongsTo(Linea::class);
    }

    public function sublinea(){
        return $this->belongsTo(SubLinea::class);
    }
}
