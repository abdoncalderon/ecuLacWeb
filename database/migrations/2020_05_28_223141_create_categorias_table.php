<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('descripcion');
            $table->string('imagen')->nullable();
            $table->boolean('estaActivo')->default(true);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
