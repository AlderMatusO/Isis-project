<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto');
            $table->unsignedDecimal('precio', 7, 2);
            $table->unsignedInteger('modo_servicio');

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('producto')
            ->references('id')->on('productos')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('modo_servicio')
            ->references('id')->on('modos_servicio')
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
        Schema::dropIfExists('precios_producto');
    }
}
