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
        Schema::create('presentacion_portafolios', function (Blueprint $table) {
            $table->id('IDPresentacion');
            $table->unsignedBigInteger('IDCargaAcademica');
            $table->string('Caratula', 255);
            $table->string('CargaAcademica', 255);
            $table->string('FilosofiaDocente', 255);
            $table->string('CV', 255);
            $table->timestamps();

            $table->foreign('IDCargaAcademica')->references('IDCargaAcademica')->on('carga_academicas');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentacion_portafolios');
    }
};
