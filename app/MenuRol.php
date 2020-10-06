<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuRol extends Model
{
    protected $table = 'menus_roles';

    protected $fillable = ['menu_id','rol_id',];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function rol(){
        return $this->belongsTo(Rol::class);
    }

    static public function existe($rol, $ruta){
        $permiso = MenuRol::join('menus','menus_roles.menu_id','=','menus.id')->where('menus_roles.rol_id',$rol)->where('menus.ruta',$ruta)->first();
        return (! empty($permiso));
    }

}
