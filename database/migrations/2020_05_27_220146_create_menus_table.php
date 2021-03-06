<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
   
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('multilenguaje')->nullable();
            $table->string('ruta')->nullable();
            $table->string('icono')->nullable();
            $table->boolean('esVisible')->nullable()->default('0');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
