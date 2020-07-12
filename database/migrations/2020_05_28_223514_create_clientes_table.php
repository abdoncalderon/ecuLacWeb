<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->foreignId('usuario_id')->primary();
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('ciudad_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('restrict');
            $table->string('direccion');
            $table->string('latitud',50)->nullable();
            $table->string('longitud',50)->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
