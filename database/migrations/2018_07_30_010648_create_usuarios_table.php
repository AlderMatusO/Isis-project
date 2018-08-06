<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('nombre', 20)->primary();
            $table->string('password', 65);
            $table->unsignedInteger('tipo');
            $table->unsignedInteger('datos');
            
            //+++++++   llaves foreaneas    +++++++
            $table->foreign('tipo')
            ->references('id')->on('tipos_usuario')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('datos')
            ->references('id')->on('datos_personales')
            ->onDelete('restrict')->onUpdate('cascade');

            //+++++++   columnas de la app   +++++++
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
