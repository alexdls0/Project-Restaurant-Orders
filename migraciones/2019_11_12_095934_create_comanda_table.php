<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idFactura')->unsigned();
            $table->foreign('idFactura')->references('id')->on('factura');
            $table->bigInteger('idProducto')->unsigned();
            $table->foreign('idProducto')->references('id')->on('producto');
            $table->bigInteger('idEmpleado')->unsigned();
            $table->foreign('idEmpleado')->references('id')->on('empleado');
            $table->tinyInteger('unidades');
            $table->float('precio', 6, 2);
            $table->tinyInteger('entregado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda');
    }
}
