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
        Schema::create('evaluacion_grupos', function (Blueprint $table) {
            $table->id();
            $table->decimal('ptj_total_grupo',15,8)->nullable();
            $table->enum('categorias', ['CONSOLIDADO','POR CONSOLIDAR','EMERGENTE','SIN CATEGORIA'])->default('SIN CATEGORIA');
            $table->enum('revalidar', ['RENOVACIÓN','PROMOCIÓN','DESCENSO','DESCALIFICACIÓN','SIN REVALIDACION'])->default('SIN REVALIDACION');

            $table->unsignedBigInteger('id_evaluacion_total');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_evaluacion_total')->references('id')->on('evaluacion_totals')->onDelete('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade');
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_grupos');
    }
};
