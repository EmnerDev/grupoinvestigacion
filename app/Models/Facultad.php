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
        return $this->belongsTo(Escuela::class,'id_facultad');
    }

    public function grupo() {
        return $this->hasMany(Grupo::class,'id_facultad');
    }
}
