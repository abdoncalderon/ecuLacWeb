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

    public function menus(){
        $menus = MenuRol::join('menus','menus_roles.menu_id','=','menus.id')->where('rol_id',$this->id)->where('esVisible',1)->get();
        return $menus;
    }


}