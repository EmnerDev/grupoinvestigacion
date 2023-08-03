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
            $table->string('space_inves');
            $table->string('pre_group_inv');
            $table->string('objective');
            $table->string('line_inv');
            $table->string('obj_desa_soste_l_i');
            $table->string('services');
            $table->string('laboratory');
            $table->string('phisical_environment');
            $table->string('labora_equip');
            $table->string('pagina')->nullable();
            $table->string('office')->nullable();
            $table->string('annexed')->nullable();
            $table->integer('phone')->nullable();

            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_facultad');
            $table->unsignedBigInteger('id_escuela');
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_area')->references('id')->on('linea_investigacions')->onDelete('cascade');
            $table->foreign('id_facultad')->references('id')->on('facultads')->onDelete('cascade');
            $table->foreign('id_escuela')->references('id')->on('escuelas')->onDelete('cascade');
            $table->foreign('id_persona')->references('id')->on('personas')->onDelete('cascade');

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
