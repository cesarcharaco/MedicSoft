<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesRecibidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales_recibidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_materialesrec')->unsigned();
            $table->integer('id_material')->unsigned();
            $table->string('cantidad',255);

            $table->foreign('id_materialesrec')->references('id')->on('recepcion_materiales')->onDelete('cascade');
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
        Schema::dropIfExists('materiales_recibidos');
    }
}
