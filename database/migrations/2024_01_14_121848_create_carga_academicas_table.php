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
        Schema::create('carga_academicas', function (Blueprint $table) {
            $table->id('IDCargaAcademica');
            $table->unsignedBigInteger('IDDocente');
            $table->unsignedBigInteger('IDRevisor');
            $table->string('AnioAcademico', 10);
            $table->timestamps();

            $table->foreign('IDDocente')->references('IDUsuario')->on('usuarios');
            $table->foreign('IDRevisor')->references('IDUsuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carga_academicas');
    }
};
