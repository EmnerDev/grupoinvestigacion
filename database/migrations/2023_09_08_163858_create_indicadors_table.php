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
        Schema::create('indicadors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('ptj_por_indicador',10,8)->nullable();
            $table->decimal('ptj_max_indicador',10,8)->nullable();

            $table->unsignedBigInteger('id_criterio');
            $table->foreign('id_criterio')->references('id')->on('criterios')->onDelete('cascade');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicadors');
    }
};
