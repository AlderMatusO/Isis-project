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
            $table->unsignedInteger('producto');
            $table->unsignedInteger('nota');
            $table->unsignedDecimal('cantidad');

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('producto')
            ->references('id')->on('precios_producto')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('nota')
            ->references('id')->on('notas')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->primary(['producto', 'nota']);
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
