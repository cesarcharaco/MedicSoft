<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oficina')->unsigned();
            $table->string('solicitante',255);
            $table->string('nacionalidad',2);
            $table->string('cedula',10);
            $table->date('fecha');
            $table->string('codigo',255);

            $table->foreign('id_oficina')->references('id')->on('oficinas');
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
        Schema::dropIfExists('pedidos_oficinas');
    }
}
