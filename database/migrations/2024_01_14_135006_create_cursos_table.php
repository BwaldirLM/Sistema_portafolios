<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->string('IDCurso', 10)->primary();            $table->unsignedBigInteger('IDCargaAcademica');
            $table->string('CodigoCurso', 20);
            $table->string('NombreCurso', 50);
            $table->integer('Creditos');
            $table->enum('TipoClase', ['T-P', 'T', 'P']);
            $table->timestamps();

            $table->foreign('IDCargaAcademica')->references('IDCargaAcademica')->on('carga_academicas');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
