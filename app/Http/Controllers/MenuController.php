<?php

namespace App\Http\Controllers;
use App\Menu;
use App\MenuRol;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\Route;
use Exception;


use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::where('id','!=','0')->paginate(10);
        return view('menus.index',compact('menus'));
    }

    public function create(){
        return view('menus.create');
    }

   
    public function store(StoreMenuRequest $request ){
        if($request->hasFile('icono'))
        {
            $archivo = $request->file('icono');
            $nombreArchivo= $archivo->getClientOriginalName();
            $archivo->move(public_path().'/img/menus/',$nombreArchivo);
        }else{
            $nombreArchivo="nofoto.jpg";
        }
        $request->validated();
        if($this->checkRoute($request->ruta)){
            Menu::create([
                'nombre'=>$request->nombre,
                'ruta'=>$request->ruta,
                'icono'=>$nombreArchivo,
                
            ]);
            return redirect()->route('menus.index');
        }else{
            return back()->withErrors(__('messages.routeNoExist'));
        }
       
    }

    public function edit(menu $menu){
        return view('menus.edit')
        ->with(compact('menu'));
    }


    public function update(UpdateMenuRequest $request, Menu $menu){
        if($request->hasFile('icono'))
        {
            $archivo = $request->file('icono');
            $nombreArchivo= $archivo->getClientOriginalName();
            $archivo->move(public_path().'/img/menus/',$nombreArchivo);
        }else{
            $nombreArchivo = $menu->icono;
        }
        $request->validated();
        $menu->update([
            'nombre'=>$request->nombre,
            'ruta'=>$request->ruta,
            'icono'=>$nombreArchivo,
        ]);
        return redirect()->route('menus.index');
    }


    public function destroy(Menu $menu){
        try{
            
            $menusroles=MenuRol::where('menu_id',$menu->id)->get();
            if (count($menusroles)>0){
                return back()->withErrors(__('messages.isFather'));
            }else{
                $nombreArchivo=$menu->icono;
                unlink(public_path().'/img/productos/'.$nombreArchivo);
                $menu->delete();
                return redirect()->route('menus.index');
            }

        }catch (Exception $e){
            return back()->withErrors(__('messages.isFather'));
        }
    }

    private function checkRoute($route) {
        /* $routes = Route::getRoutes()->getRoutes();
        foreach($routes as $r){
            if($r->getUri() == $route){
                return true;
            }
        }
    
        return false; */
        return Route::has($route);
    }
    

    
}
