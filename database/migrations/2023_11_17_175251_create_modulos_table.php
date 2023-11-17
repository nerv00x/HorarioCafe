<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('materia');
            $table->integer('h_semanales');
            $table->integer('h_totales');
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('especialidad_id');
            // $table->unsignedBigInteger('estudio_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('especialidad_id')->references('id')->on('especialidades');
            // $table->foreign('estudio_id')->references('id')->on('estudios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('modulos');
    }
};
