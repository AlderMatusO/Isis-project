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
            $table->string('mesa_id', 10);
            $table->string('mesero_id', 20);
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('estado_id');

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('mesa_id')
            ->references('nombre')->on('mesas')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('mesero_id')
            ->references('nombre')->on('usuarios')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('estado_id')
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
