<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'contenidos';

    // Campos que pueden ser asignados masivamente (mass assignable)
    protected $fillable = [
        'IDCargaAcademica',
        'Silabo',
        'Avance',
        'Asistencia',
    ];
}
