<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas_laboratorios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_consultalab')->unsigned();
            $table->integer('id_tipoconsulta')->unsigned();
            $table->string('cantidad',1)->default('1');

            $table->foreign('id_consultalab')->references('id')->on('consultaslab')->onDelete('cascade');
            $table->foreign('id_tipoconsulta')->references('id')->on('tipo_consulta')->onDelete('cascade');
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
        Schema::dropIfExists('consultas_laboratorios');
    }
}
