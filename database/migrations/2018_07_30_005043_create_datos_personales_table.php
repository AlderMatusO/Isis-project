<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosPersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 70);
            $table->string('apellidos', 70);
            $table->smallInteger('telefono');
            $table->unsignedInteger('referencia')->nullable(true);
            $table->unsignedInteger('parentezco')->nullable(true);
            $table->unsignedInteger('direccion')->nullable(true);

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('referencia')
            ->references('id')->on('datos_personales')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('parentezco')
            ->references('id')->on('parentezcos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('direccion')
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
        Schema::dropIfExists('datos_personales');
    }
}
