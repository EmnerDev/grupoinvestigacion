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
        return $this->belongsTo(Facultad::class);
    }

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }
}
