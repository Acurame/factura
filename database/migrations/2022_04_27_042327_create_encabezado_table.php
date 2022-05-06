<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encabezado', function (Blueprint $table) {
            $table->bigIncrements('numeroFactura');
            $table->date('fechaFactura');
            $table->bigInteger('empleadoId')->unsigned();
            $table->bigInteger('clienteId')->unsigned();
            $table->timestamps();
            $table->foreign('empleadoId')->references('empleadoId')->on('empleado')->onDelete("cascade");
            $table->foreign('clienteId')->references('clienteId')->on('cliente')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encabezado');
    }
};
