<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('direccion');
            $table->string('telefono',15);
            $table->foreignId('ciudad_id');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
}
