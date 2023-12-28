<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function escuela(){
        return $this->hasMany(Escuela::class,'id_facultad');
    }

    public function grupo() {
        return $this->hasMany(Grupo::class,'id_facultad');
    }

    public function pivotGrupoLinea() {
        return $this->hasMany(PivotGrupoLinea::class,'id_grupo');
    }
}
