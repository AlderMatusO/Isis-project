<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_productos', function (Blueprint $table) {
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('nota_id');
            $table->unsignedDecimal('cantidad');

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('producto_id')
            ->references('id')->on('precios_producto')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('nota_id')
            ->references('id')->on('notas')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->primary(['producto_id', 'nota_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas_productos');
    }
}
