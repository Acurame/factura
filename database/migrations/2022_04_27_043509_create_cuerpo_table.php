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
        Schema::create('cuerpo', function (Blueprint $table) {
            $table->integerIncrements('detalleId');
            $table->integer('cantida');
            $table->decimal('precio');
            $table->bigInteger('numeroFactura')->unsigned();
            $table->bigInteger('productoId')->unsigned();
            $table->timestamps();
            $table->foreign('numeroFactura')->references('numeroFactura')->on('encabezado')->onDelete("cascade");
            $table->foreign('productoId')->references('productoId')->on('productos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuerpo');
    }
};
