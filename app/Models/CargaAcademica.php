<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaAcademica extends Model
{
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'IDCargaAcademica', 'IDCargaAcademica');
    }
    public function revisor()
    {
        return $this->belongsTo(Usuario::class, 'IDRevisor', 'IDUsuario');
    }
    use HasFactory;
}
