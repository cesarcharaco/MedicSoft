<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pacientent')->unsigned();
            $table->integer('id_consultamonto')->unsigned();
            $table->date('fecha');
            $table->enum('estado',['En Cola','Vista','Eliminada'])->default('En Cola');
            $table->string('posicion',2);
            $table->string('diagnostico',255)->default('Sin diagnosticar');

            $table->foreign('id_pacientent')->references('id')->on('pacientes_nt')->onDelete('cascade');
            $table->foreign('id_consultamonto')->references('id')->on('consultas_montos')->onDelete('cascade');
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
        Schema::dropIfExists('consultas');
    }
}
