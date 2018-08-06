<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mesa', 10);
            $table->string('mesero', 20);
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('estado');

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('mesa')
            ->references('nombre')->on('mesas')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('mesero')
            ->references('nombre')->on('usuarios')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('estado')
            ->references('id')->on('estados_consumo')
            ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumos');
    }
}
