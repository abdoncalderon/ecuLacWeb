<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaCreacion');
            $table->dateTime('fechaConfirmacion');
            $table->dateTime('fechaDespacho');
            $table->dateTime('fechaEntrega');
            $table->foreignId('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('vendedor_id');
            $table->foreign('vendedor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('repartidor_id');
            $table->foreign('repartidor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('estado',10)->default('abierto'); /* {abierto, confirmado, despachado, entregado} */
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
        Schema::dropIfExists('pedidos');
    }
}
