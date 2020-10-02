<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesTable extends Migration
{

    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->foreignId('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('ciudades');
    }
}
