<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaAcademica extends Model
{
    protected $primaryKey = 'IDCargaAcademica';
    
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'IDCargaAcademica', 'IDCargaAcademica');
    }
    public function revisor()
    {
        return $this->belongsTo(User::class, 'IDRevisor', 'id');
    }
    public function docente()
    {
        return $this->belongsTo(User::class, 'IDDocente', 'id');
    }
    use HasFactory;
}
