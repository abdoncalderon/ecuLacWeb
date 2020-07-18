<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
  
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->foreignId('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('cascade')->onDelete('restrict');
            $table->decimal('subtotal',9,2);
            $table->decimal('valorDescuento',9,2);
            $table->decimal('valorIva',9,2);
            $table->string('tipoPago',13); /* {efectivo, tarjeta, transferencia} */
            $table->string('estado',9); /* {pagada, pendiente} */
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
