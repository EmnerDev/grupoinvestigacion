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
            $table->decimal('ac_ptj1',2,2);
            $table->decimal('ac_ptj2',2,2);
            $table->decimal('ac_ptj3',2,2);
            $table->decimal('ac_ptj4',2,2);
            $table->decimal('ac_ptj5',2,2);
            $table->decimal('ac_ptj_subtotal',3,2);
            $table->decimal('ac_ptj_total',3,2);
            $table->decimal('lib_ptj1',2,2);
            $table->decimal('lib_ptj2',2,2);
            $table->decimal('lib_ptj3',2,2);
            $table->decimal('lib_ptj_subtotal',3,2);
            $table->decimal('lib_ptj_total',3,2);
            $table->decimal('cl_ptj1',2,2);
            $table->decimal('cl_ptj2',2,2);
            $table->decimal('cl_ptj3',2,2);
            $table->decimal('cl_ptj_subtotal',3,2);
            $table->decimal('cl_ptj_total',3,2);
            $table->decimal('rpi_ptj1',2,2);
            $table->decimal('rpi_ptj2',2,2);
            $table->decimal('rpi_ptj3',2,2);
            $table->decimal('rpi_ptj4',2,2);
            $table->decimal('rpi_ptj5',2,2);
            $table->decimal('rpi_ptj_subtotal',3,2);
            $table->decimal('rpi_ptj_total',3,2);
            $table->decimal('atesis_ptj1',2,2);
            $table->decimal('atesis_ptj2',2,2);
            $table->decimal('atesis_ptj3',2,2);
            $table->decimal('atesis_ptj4',2,2);
            $table->decimal('atesis_ptj_subtotal',3,2);
            $table->decimal('atesis_ptj_total',3,2);
            $table->decimal('dinv_ptj1',2,2);
            $table->decimal('dinv_ptj2',2,2);
            $table->decimal('dinv_ptj3',2,2);
            $table->decimal('dinv_ptj4',2,2);
            $table->decimal('dinv_ptj5',2,2);
            $table->decimal('dinv_ptj6',2,2);
            $table->decimal('dinv_ptj7',2,2);
            $table->decimal('dinv_ptj_subtotal',3,2);
            $table->decimal('dinv_ptj_total',3,2);
            $table->decimal('ir_ptj1',2,2);
            $table->decimal('ir_ptj2',2,2);
            $table->decimal('ir_ptj_subtotal',3,2);
            $table->decimal('ir_ptj_total',3,2);
            $table->decimal('ic_ptj1',2,2);
            $table->decimal('ic_ptj2',2,2);
            $table->decimal('ic_ptj_subtotal',3,2);
            $table->decimal('ic_ptj_total',3,2);
            $table->decimal('ea_ptj1',2,2);
            $table->decimal('ea_ptj2',2,2);
            $table->decimal('ea_ptj3',2,2);
            $table->decimal('ea_ptj4',2,2);
            $table->decimal('ea_ptj5',2,2);
            $table->decimal('ea_ptj_subtotal',3,2);
            $table->decimal('ea_ptj_total',3,2);
            $table->decimal('pr_ptj1',2,2);
            $table->decimal('pr_ptj2',2,2);
            $table->decimal('pr_ptj_subtotal',3,2);
            $table->decimal('pr_ptj_total',3,2);
            $table->decimal('pite_ptj1',2,2);
            $table->decimal('pite_ptj2',2,2);
            $table->decimal('pite_ptj3',2,2);
            $table->decimal('pite_ptj4',2,2);
            $table->decimal('pite_ptj5',2,2);
            $table->decimal('pite_ptj_subtotal',3,2);
            $table->decimal('pite_ptj_total',3,2);
            $table->decimal('total',3,2)->nullable();
            $table->decimal('gran_total',3,2)->nullable();

            $table->unsignedBigInteger('id_integrante');          
            $table->foreign('id_integrante')->references('id')->on('integrantes')->onDelete('cascade'); 
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
