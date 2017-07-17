<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasMontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas_montos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipoconsulta')->unsigned();
            $table->double('monto');
            $table->date('fecha');
            
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
        Schema::dropIfExists('consultas_montos');
    }
}
