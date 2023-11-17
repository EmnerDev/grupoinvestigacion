<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'name',
        'first_name',
        'last_name',
        'phone',
        'email',
        'id_tipo',
        'user_id'
    ];

    public function tipo(){
        return $this->belongsTo(Tipo::class, 'id_tipo');
    }

    public function integrante() {
        return $this->hasMany(Integrante::class,'id_persona');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
