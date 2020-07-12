<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaCreacion');
            $table->dateTime('fechaConfirmacion')->nullable();
            $table->dateTime('fechaDespacho')->nullable();
            $table->dateTime('fechaEntrega')->nullable();
            $table->foreignId('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('vendedor_id')->nullable();
            $table->foreign('vendedor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('repartidor_id')->nullable();
            $table->foreign('repartidor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('estado',10)->nullable()->default('ABIERTO'); /* {abierto, confirmado, despachado, entregado} */
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
