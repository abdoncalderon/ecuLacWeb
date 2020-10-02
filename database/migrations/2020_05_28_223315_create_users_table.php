<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCompleto');
            $table->string('cedula',10)->unique();
            $table->string('telefono',15);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usuario',50)->unique();
            $table->string('password');
            $table->foreignId('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
            $table->boolean('estaActivo')->nullable()->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
