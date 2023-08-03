<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_escuela'
    ];

    public function escuela() {
        return $this->belongsTo(Escuela::class);
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }
}
