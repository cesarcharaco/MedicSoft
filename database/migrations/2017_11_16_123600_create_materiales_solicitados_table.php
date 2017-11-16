<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesSolicitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales_solicitados', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('id_material')->unsigned();
            $table->string('cantidad',255);

            $table->foreign('id_material')->references('id')->on('materiales')->onDelete('cascade');
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
        Schema::dropIfExists('materiales_solicitados');
    }
}
