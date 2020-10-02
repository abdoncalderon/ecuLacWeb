<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposTable extends Migration
{
   
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->foreignId('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }
   
    
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
}
