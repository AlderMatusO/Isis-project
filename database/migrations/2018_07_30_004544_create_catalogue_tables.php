<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogueTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 20);
        });

        Schema::create('parentezcos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 20);
        });

        Schema::create('categorias_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 20);
        });

        Schema::create('modos_servicio',function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 20);
        });

        Schema::create('estados_consumo',function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 20);
        });

        Schema::create('metodos_pago',function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_usuario');
        Schema::dropIfExists('parentezcos');
        Schema::dropIfExists('categorias_producto');
        Schema::dropIfExists('modos_servicio');
        Schema::dropIfExists('estados_consumo');
        Schema::dropIfExists('metodos_pago');
    }
}
