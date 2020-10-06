<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['nombre','multilenguaje','ruta', 'icono','esVisible'];

    public function roles(){
        return $this->hasMany(MenuRol::class);
    }
}
