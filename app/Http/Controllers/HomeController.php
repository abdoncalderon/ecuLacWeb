<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use App\Categoria;
use App\Producto;
use App\Pedido;
use App\ItemPedido;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        User::crearSuperUsuario();
        if(Auth::guest()){
            $categorias = Categoria::all()->take(3);
            $destacados = Producto::where('esDestacado',1)->take(8)->get();
            return view('tienda.vitrina')
            ->with(compact('categorias'))
            ->with(compact('destacados'));
        }else{
            if(Rol::esExterno(auth()->user()->rol_id)==1){
               
                $categorias = Categoria::all()->take(3);
                $destacados = Producto::where('esDestacado',1)->take(8)->get();
                return view('tienda.vitrina')
                ->with(compact('categorias'))
                ->with(compact('destacados'));
            }else{
                return view('layouts.internal');
            }
           
        }
    }
    
}
