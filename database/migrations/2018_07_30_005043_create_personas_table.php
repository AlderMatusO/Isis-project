<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 70);
            $table->string('apellidos', 70);
            $table->unsignedInteger('telefono');
            $table->unsignedInteger('referencia_id')->nullable(true);
            $table->unsignedInteger('parentezco_id')->nullable(true);
            $table->unsignedInteger('direccion_id')->nullable(true);

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('referencia_id')
            ->references('id')->on('personas')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('parentezco_id')
            ->references('id')->on('parentezcos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('direccion_id')
            ->references('id')->on('direcciones')
            ->onDelete('set null')->onUpdate('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
