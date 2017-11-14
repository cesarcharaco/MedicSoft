<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaslabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultaslab', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pacientent')->unsigned();
            $table->date('fecha');
            $table->enum('estado',['En Cola','Vista','Eliminada'])->default('En Cola');
            $table->string('posicion',2);

            $table->foreign('id_pacientent')->references('id')->on('pacientes_nt')->onDelete('cascade');
            
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
        Schema::dropIfExists('consultaslab');
    }
}
