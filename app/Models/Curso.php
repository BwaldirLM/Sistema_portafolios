<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'IDCurso';
    public $incrementing = false;
    protected $keyType = 'string';
    public function cargaAcademica()
    {
        return $this->belongsTo(CargaAcademica::class, 'IDCargaAcademica');
    }
    use HasFactory;
}
