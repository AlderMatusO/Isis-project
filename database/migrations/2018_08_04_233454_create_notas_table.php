<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('consumo');
            $table->unsignedInteger('metodo_pago')->nullable();
            $table->unsignedDecimal('subtotal', 5, 2)->nullable();
            $table->unsignedDecimal('iva', 5, 2)->nullable();
            $table->unsignedDecimal('total', 5, 2)->nullable();

            //+++++++   llaves foreaneas    +++++++
            $table->foreign('metodo_pago')
            ->references('id')->on('metodos_pago')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('consumo')
            ->references('id')->on('consumos')
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
        Schema::dropIfExists('notas');
    }
}
