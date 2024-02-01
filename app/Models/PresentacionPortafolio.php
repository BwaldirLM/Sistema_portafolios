<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentacionPortafolio extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'presentacion_portafolios';

    // Campos que pueden ser asignados masivamente (mass assignable)
    protected $fillable = [
        'IDCargaAcademica',
        'Caratula',
        'CargaAcademica',
        'FilosofiaDocente',
        'CV',
    ];
}
