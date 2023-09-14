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
        Schema::create('evaluacion_totals', function (Blueprint $table) {
            $table->id();
            $table->decimal('ptj_total',10,8)->nullable();

            $table->unsignedBigInteger('id_evaluacion_criterio');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_evaluacion_criterio')->references('id')->on('evaluacion_criterios')->onDelete('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_totals');
    }
};
