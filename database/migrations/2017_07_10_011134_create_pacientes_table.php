<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nacionalidad',2);
            $table->string('cedula',8)->unique();
            $table->string('codigo_telf',4);
            $table->string('telefono',7);
            $table->text('direccion');
            $table->string('titular',2);
            $table->string('institucion',60);
            $table->string('edad',2);
            $table->string('genero',1);
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
        Schema::dropIfExists('pacientes');
    }
}
