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
        Schema::create('tipos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
        });
        Schema::create('parentezcos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_usuarios');
        Schema::dropIfExists('parentezcos');
    }
}
