<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'programin_type',
        'start_date',
        'end_date',
        'description',
        'status',
    ];

    public static function enumPrograminOption() {
        return [
            'INSCRIPCION' => 'INSCRIPCION',
            'ANEXO' => 'ANEXO',
            'REVALIDACION' => 'REVALIDACION',
        ];
    }
}
