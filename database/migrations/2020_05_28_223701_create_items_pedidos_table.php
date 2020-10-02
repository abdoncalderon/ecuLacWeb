<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsPedidosTable extends Migration
{
    public function up()
    {
        Schema::create('items_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('cantidad');
            $table->decimal('precioUnitario',6,2);
            $table->decimal('descuento',4,2);
            $table->decimal('iva',4,2);
            $table->decimal('subtotal',8,2);
            $table->string('estado',10)->default('AGREGADO'); /* {agregado, confirmado, despachado, entregado} */
            $table->dateTime('fechaConfirmacion')->nullable();
            $table->dateTime('fechaDespacho')->nullable();
            $table->dateTime('fechaEntrega')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('items_pedidos');
    }
}
