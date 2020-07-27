<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuRol extends Model
{
    protected $table = 'menus_roles';

    protected $fillable = ['menu_id','rol_id',];

    static public function menu($menuId){
        $menu = Menu::find($menuId);
        return $menu;
    }

    static public function menusRol($rolId){
        $menusRol = MenuRol::join('menus','menus_roles.menu_id','=','menus.id')->where('rol_id',$rolId)->where('esVisible',1)->get();
        return $menusRol;
    }

    static public function existe($rol, $ruta){
        
        $permiso = MenuRol::join('menus','menus_roles.menu_id','=','menus.id')->where('menus_roles.rol_id',$rol)->where('menus.ruta',$ruta)->first();
        
        return (! empty($permiso));
    }

    

}
