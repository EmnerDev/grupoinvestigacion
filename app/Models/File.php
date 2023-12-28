<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_grupo',
        'plan_trabajo',
        'anexo',
        'revalidacion',
    ];

    public function grupo() {
        return $this->belongsTo(Grupo::class,'id_grupo');
    }
}



