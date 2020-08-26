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
    public function index(Request $request){
                    
        if(count($request->all())>0){
            $nombre = $request->get('nombre');
            $menus = Menu::Where('nombre','LIKE','%'.$nombre.'%')->paginate(10);
        }else{
            $menus = Menu::where('id','!=','0')->paginate(10);
        }
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
                'multilenguaje'=>$request->multilenguaje,
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
        if($request->has('esVisible')){
            $esVisible = '1';
        }else{
            $esVisible = '0';
        }
        $menu->update([
            'nombre'=>$request->nombre,
            'multilenguaje'=>$request->multilenguaje,
            'ruta'=>$request->ruta,
            'icono'=>$nombreArchivo,
            'esVisible'=>$esVisible,
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
        return Route::has($route);
    }
    

    
}
