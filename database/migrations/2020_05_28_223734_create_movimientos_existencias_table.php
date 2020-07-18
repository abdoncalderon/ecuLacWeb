<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosExistenciasTable extends Migration
{
    
    public function up()
    {
        Schema::create('movimientos_existencias', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->foreignId('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('sucursal_id');
            $table->foreign('sucursal_id')->references('id')->on('sucursales')->onUpdate('cascade')->onDelete('restrict');
            $table->string('tipoMovimiento',11); /* {reposicion, cancelacion, venta} */
            $table->unsignedInteger('cantidad');
            $table->unsignedInteger('saldo');
            $table->timestamps();
        });
    }
    
   
    public function down()
    {
        Schema::dropIfExists('movimientos_existencias');
    }
}
