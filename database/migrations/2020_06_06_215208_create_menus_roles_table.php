<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusRolesTable extends Migration
{

    public function up()
    {
        Schema::create('menus_roles', function (Blueprint $table) {
            $table->foreignId('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
            $table->primary(['menu_id', 'rol_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus_roles');
    }
}
