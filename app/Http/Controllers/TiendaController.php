<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Categoria;
use App\ImagenProducto;
use App\Pedido;
use App\ItemPedido;

use Illuminate\Http\Request;


class TiendaController extends Controller
{
    public function catalogo(Request $request){
        $busqueda = $request->busqueda;
        if(empty($busqueda)){
            $productos = Producto::all();
            $categorias= Producto::select('categoria_id')->distinct()->get();
            $tipos= Producto::select('tipo_id')->distinct()->get();
            $presentaciones= Producto::select('presentacion_id')->distinct()->get();
        }else{
            $productos = Producto::where('descripcion','like', '%'.$busqueda.'%')->get();
            $categorias = Producto::select('categoria_id')->where('descripcion','like', '%'.$busqueda.'%')->distinct()->get();
            $tipos = Producto::select('tipo_id')->where('descripcion','like', '%'.$busqueda.'%')->distinct()->get();
            $presentaciones = Producto::select('presentacion_id')->where('descripcion','like', '%'.$busqueda.'%')->distinct()->get();
        }
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'));
    }

    public function vitrina(){
        $categorias = Categoria::all()->take(4);
        $destacados = Producto::all()->take(10);
        return view('tienda.showcase')
            ->with(compact('categorias'))
            ->with(compact('destacados'));
    }

    public function estante(Producto $producto){
        $imagenes = ImagenProducto::where('producto_id',$producto->id)->get();
        $imagenPredeterminada = $producto->imagenPredeterminada($producto->id);
        return view('tienda.estante')
        ->with(compact('producto'))
        ->with(compact('imagenes'))
        ->with(compact('imagenPredeterminada'));
    }

    public function filtroCategoria($id){
        $productos = Producto::where('categoria_id','=',$id)->get();
        $categorias = Producto::select('categoria_id')->where('categoria_id','=',$id)->distinct()->get();
        $tipos = Producto::select('tipo_id')->where('categoria_id','=',$id)->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('categoria_id','=',$id)->distinct()->get();

        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'));
    }

    public function filtroTipo($id){
        $productos = Producto::where('tipo_id','=',$id)->get();
        $tipos = Producto::select('tipo_id')->where('tipo_id','=',$id)->distinct()->get();
        $categorias = Producto::select('categoria_id')->where('tipo_id','=',$id)->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('tipo_id','=',$id)->distinct()->get();

        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'));
    }

    public function filtroPresentacion($id){
        $productos = Producto::where('presentacion_id','=',$id)->get();
        $tipos = Producto::select('tipo_id')->where('presentacion_id','=',$id)->distinct()->get();
        $categorias = Producto::select('categoria_id')->where('presentacion_id','=',$id)->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('presentacion_id','=',$id)->distinct()->get();

        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'));
    }

    
   
}
