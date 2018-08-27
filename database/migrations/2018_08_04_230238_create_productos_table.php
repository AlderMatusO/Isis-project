<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 35);
            $table->string('nombre_imagen', 50)->nullable();
            $table->unsignedInteger('tipo_id');
            $table->unsignedInteger('categoria_id');

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('tipo_id')
            ->references('id')->on('productos_generales')
            ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('categoria_id')
            ->references('id')->on('categorias_producto')
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
        Schema::dropIfExists('productos');
    }
}
