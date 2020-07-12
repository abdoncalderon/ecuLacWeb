<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    protected $table = 'imagenes_productos';

    protected $fillable = ['imagen','producto_id','predeterminada',];
}
