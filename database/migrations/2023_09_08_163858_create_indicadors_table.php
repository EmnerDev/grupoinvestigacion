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
            $table->decimal('ptj1',2,2)->nullable();
            $table->decimal('ptj2',2,2)->nullable();
            $table->decimal('ptj3',2,2)->nullable();
            $table->decimal('ptj4',2,2)->nullable();
            $table->decimal('ptj5',2,2)->nullable();
            $table->decimal('ptj6',2,2)->nullable();
            $table->decimal('ptj7',2,2)->nullable();
            $table->decimal('ptj_subtotal',3,2)->nullable();
            $table->decimal('ptj_total',3,2)->nullable();            
            $table->decimal('total',3,2)->nullable();
            $table->decimal('gran_total',3,2)->nullable();

            $table->unsignedBigInteger('id_criterio');
            $table->unsignedBigInteger('id_integrante');
            $table->unsignedBigInteger('id_grupo');
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
        Schema::dropIfExists('indicadors');
    }
};
