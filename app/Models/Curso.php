<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $primaryKey = 'IDCurso'; // Definir la clave primaria
    public $incrementing = false; // Indicar que la clave primaria no es autoincremental

    protected $fillable = [
        'IDCurso',
        'IDCargaAcademica',
        'IDDocente',
        'NombreCurso',
        'Creditos',
        'TipoClase',
        'DetallesCurso',
    ];

    // Definir la relación con el modelo User (Docente)
    public function docente()
    {
        return $this->belongsTo(User::class, 'IDDocente', 'id');
    }
}
