<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->unique();
            $table->foreignId('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('presentacion_id');
            $table->foreign('presentacion_id')->references('id')->on('presentaciones')->onUpdate('cascade')->onDelete('restrict');
            $table->float('precioUnitario',6,2);
            $table->float('descuento',4,2)->default('0.0');
            $table->unsignedInteger('existenciaActual')->default('0');
            $table->string('estado',15)->default('disponible'); /* {disponible, descontinuado} */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
