<?php

namespace App\Http\Controllers;

use App\MenuRol;
use App\Rol;
use App\Menu;
use App\Http\Requests\StoreMenuRolRequest;

use Illuminate\Http\Request;

class MenuRolController extends Controller
{
    public function add(Rol $rol){
        $mismenus = MenuRol::where('rol_id',$rol->id)->get();
        $menusdisponibles = [];
        $menus = Menu::all();
        foreach ($menus as $menu){
            $existe = false;
            foreach($mismenus as $mimenu){
                if($menu->id==$mimenu->menu_id){
                    $existe = true;
                    break;
                }
            }
            if (!$existe){
                array_push($menusdisponibles,$menu);
            }
        }
        return view('menusroles.add')
        ->with(compact('rol'))
        ->with(compact('mismenus'))
        ->with(compact('menusdisponibles'));
    }

    public function store(StoreMenuRolRequest $request, Rol $rol){
        MenuRol::create($request->validated());
        return redirect()->route('menusroles.add',$rol);
    }

    public function destroy($menuId, Rol $rol){
        MenuRol::where('menu_id',$menuId)->where('rol_id',$rol->id)->delete();
        return redirect()->route('menusroles.add',$rol);
    }
}
