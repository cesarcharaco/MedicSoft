<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_especialidad')->unsigned();
            $table->integer('id_turno')->unsigned();
            $table->enum('estado',['Vacante','Ocupado'])->default('Vacante');

            $table->foreign('id_especialidad')->references('id')->on('especialidades')->onDelete('cascade');
            $table->foreign('id_turno')->references('id')->on('turnos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
