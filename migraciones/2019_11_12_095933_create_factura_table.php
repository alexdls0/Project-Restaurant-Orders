<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numeroMesa')->unsigned();
            $table->foreign('numeroMesa')->references('id')->on('mesa');
            $table->dateTime('horaInicio');
            $table->bigInteger('idEmpleadoInicio')->unsigned();
            $table->foreign('idEmpleadoInicio')->references('id')->on('empleado');
            $table->dateTime('horaCierre')->nullable();
            $table->bigInteger('idEmpleadoCierre')->unsigned()->nullable();
            $table->foreign('idEmpleadoCierre')->references('id')->on('empleado');
            $table->float('total', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
