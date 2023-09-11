<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name',
        'ptj1',
        'ptj2',
        'ptj3',
        'ptj4',
        'ptj5',
        'ptj6',
        'ptj7',
        'ptj_subtotal',
        'ptj_total',
        'total',
        'gran_total',
        'id_criterio',
        'id_integrante',
        'id_grupo',
    ];
}
