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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->id();
            $table->enum('condition',['inv. Titular','Inv. Colaborador','Inv. En formacion', 'Inv. Posdoctorado','Coordinador'])->default('inv. Titular');
            $table->string('orcid');
            $table->string('cti_vitae');
            $table->string('google_scholar');

            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_grupo')->references('id')->on('grupos')->onDelete('cascade');            
            $table->foreign('id_persona')->references('id')->on('personas')->onDelete('cascade');            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrantes');
    }
};
