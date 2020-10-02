<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentacionesTable extends Migration
{
    
    public function up()
    {
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('restrict');
            $table->string('envase',10);
            $table->integer('contenido');
            $table->string('medida',6);
            $table->timestamps();
        });
    }
   
    
    public function down()
    {
        Schema::dropIfExists('presentaciones');
    }
}
