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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id('IDEvaluacion');
            $table->unsignedBigInteger('IDCargaAcademica');
            $table->char('EvaluacionEntrada', 1);
            $table->char('PrimeraParcial', 1);
            $table->char('SegundaParcial', 1);
            $table->char('TerceraParcial', 1);
            $table->char('Sustitutorio', 1);
            $table->timestamps();

            $table->foreign('IDCargaAcademica')->references('IDCargaAcademica')->on('carga_academicas');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
