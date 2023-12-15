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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('space_inves')->nullable();
            $table->string('pre_group_inv');
            $table->string('objective');
            $table->string('obj_desa_soste_l_i');
            $table->string('services');
            $table->string('laboratory');
            $table->string('phisical_environment')->nullable();
            $table->string('labora_equip')->nullable();
            $table->string('pagina')->nullable();
            $table->string('office')->nullable();
            $table->string('annexed')->nullable();
            $table->integer('phone')->nullable();
            $table->decimal('puntaje_total',3,2)->nullable();
            $table->enum('categorias', ['CONSOLIDADO','POR CONSOLIDAR','EMERGENTE','SIN EVALUAR'])->default('SIN EVALUAR');

            $table->unsignedBigInteger('id_area')->nullable();
            $table->unsignedBigInteger('id_linea')->nullable();
            $table->unsignedBigInteger('id_sublinea')->nullable();
            $table->unsignedBigInteger('id_facultad')->nullable();
            $table->unsignedBigInteger('id_escuela')->nullable();
            $table->foreign('id_area')->references('id')->on('area_investigacions')->onDelete('cascade');
            $table->foreign('id_linea')->references('id')->on('lineas')->onDelete('cascade');
            $table->foreign('id_sublinea')->references('id')->on('sub_lineas')->onDelete('cascade');
            $table->foreign('id_facultad')->references('id')->on('facultads')->onDelete('cascade');
            $table->foreign('id_escuela')->references('id')->on('escuelas')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
