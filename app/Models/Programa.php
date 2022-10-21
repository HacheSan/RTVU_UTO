<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{

    use HasFactory;
    protected $fillable = [
        'categoria_dia',
        'nombre_programa',
        'descripcion',
        'foto_programa',
        'hora',
        'fecha_registro'
    ];
}
