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
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->nullable();
            $table->decimal('puntaje',15,8)->nullable();

            $table->unsignedBigInteger('id_criterio');
            $table->unsignedBigInteger('id_indicador');
            $table->unsignedBigInteger('id_integrante');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_criterio')->references('id')->on('criterios')->onDelete('cascade');
            $table->foreign('id_indicador')->references('id')->on('indicadors')->onDelete('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('id_integrante')->references('id')->on('integrantes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacions');
    }
};
