<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('rutas');


            $table->integer('capacidad_pasajeros');

            $table->datetime('fecha_hora');

            $table->integer('piloto_id');
            $table->foreign('piloto_id')->references('cedula')->on('personal');

            $table->Integer('copiloto_id');
            $table->foreign('copiloto_id')->references('cedula')->on('personal');

            $table->Integer('sobrecargo1_id');
            $table->foreign('sobrecargo1_id')->references('cedula')->on('personal');

            $table->Integer('sobrecargo2_id');
            $table->foreign('sobrecargo2_id')->references('cedula')->on('personal');


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
        Schema::dropIfExists('vuelos');
    }
}
