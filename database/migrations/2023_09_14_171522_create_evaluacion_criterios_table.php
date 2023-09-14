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
        Schema::create('evaluacion_criterios', function (Blueprint $table) {
            $table->id();
            $table->decimal('ptj_total_indicador',10,8)->nullable();

            $table->unsignedBigInteger('id_evaluacion');
            $table->unsignedBigInteger('id_criterio');
            $table->unsignedBigInteger('id_integrante');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_evaluacion')->references('id')->on('evaluacions')->onDelete('cascade');
            $table->foreign('id_criterio')->references('id')->on('criterios')->onDelete('cascade');
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
        Schema::dropIfExists('evaluacion_criterios');
    }
};
