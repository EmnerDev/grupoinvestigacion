<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_facultad'
    ];

    public function facultad() {
        return $this->hasMany(Facultad::class,'id_facultad');
    }

    public function grupo() {
        return $this->hasMany(Grupo::class,'id_escuela');
    }
}
