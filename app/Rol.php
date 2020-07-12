<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = ['nombre',];

    static public function esExterno($id){
        $resultado = Rol::find($id);
        return $resultado->esExterno;
    }

}