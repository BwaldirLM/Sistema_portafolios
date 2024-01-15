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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id('IDContenido');
            $table->unsignedBigInteger('IDCargaAcademica');
            $table->char('Silabo', 1);
            $table->char('Avance', 1);
            $table->char('Asistencia', 1);
            $table->timestamps();

            $table->foreign('IDCargaAcademica')->references('IDCargaAcademica')->on('carga_academicas');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos');
    }
};
