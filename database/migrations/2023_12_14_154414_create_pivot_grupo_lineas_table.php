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
        Schema::create('pivot_grupo_lineas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_linea');
            $table->unsignedBigInteger('id_sublinea');
            $table->unsignedBigInteger('id_facultad')->nullable();
            $table->unsignedBigInteger('id_escuela')->nullable();
            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('id_area')->references('id')->on('area_investigacions')->onDelete('cascade');
            $table->foreign('id_linea')->references('id')->on('lineas')->onDelete('cascade');
            $table->foreign('id_sublinea')->references('id')->on('sub_lineas')->onDelete('cascade');
            $table->foreign('id_facultad')->references('id')->on('facultads')->onDelete('cascade');
            $table->foreign('id_escuela')->references('id')->on('escuelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_grupo_lineas');
    }
};
