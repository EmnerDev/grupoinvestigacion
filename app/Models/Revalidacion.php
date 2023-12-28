<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revalidacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_grupo',
        'file_revalidacion',
        'name_revalidacion',

    ];

    public function grupo(){
        return $this->belongsTo(Grupo::class,'id_grupo');
    }
}
