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
        Schema::create('sub_lineas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_linea');
            $table->foreign('id_area')->references('id')->on('area_investigacions')->onDelete('cascade');
            $table->foreign('id_linea')->references('id')->on('lineas')->onDelete('cascade');
            $table->boolean('status')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_lineas');
    }
};
