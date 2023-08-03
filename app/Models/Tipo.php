<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function personas() {
        return $this->hasMany(Persona::class, 'id_tipo');
    }
}
