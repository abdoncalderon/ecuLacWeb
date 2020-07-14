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
        $busqueda = $request->input('busqueda');
        if(empty($busqueda)){
            $productos = Producto::where('id','!=','0')->paginate(12);
            $categorias= Producto::select('categoria_id')->distinct()->get();
            $tipos= Producto::select('tipo_id')->distinct()->get();
            $presentaciones= Producto::select('presentacion_id')->distinct()->get();
        }else{
            $productos = Producto::where('nombre','like', '%'.$busqueda.'%')->paginate(12);
            $categorias = Producto::select('categoria_id')->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
            $tipos = Producto::select('tipo_id')->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
            $presentaciones = Producto::select('presentacion_id')->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        }
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'));
    }

    public function vitrina(){
        $categorias = Categoria::all()->take(3);
        $destacados = Producto::where('esDestacado',1)->take(8)->get();
        return view('tienda.vitrina')
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

    public function filtroBorrar(){
        $busqueda = null;
        $productos = Producto::where('id','!=',0)->paginate(12);
        $categorias = Producto::select('categoria_id')->where('id','!=',0)->distinct()->get();
        $tipos = Producto::select('tipo_id')->where('id','!=',0)->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('id','!=',0)->distinct()->get();
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'));
    }

    public function filtroDestacados(){
        $busqueda = null;
        $productos = Producto::where('esDestacado',1)->paginate(12);
        $categorias = Producto::select('categoria_id')->where('esDestacado',1)->distinct()->get();
        $tipos = Producto::select('tipo_id')->where('esDestacado',1)->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('esDestacado',1)->distinct()->get();
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'));
    }

    public function filtroCategoria($categoria, $busqueda = null){
       
        $productos = Producto::where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->paginate(12);
        $categorias = Producto::select('categoria_id')->where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $tipos = Producto::select('tipo_id')->where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'));
    }

    public function filtroTipo($tipo, $busqueda = null){
        $productos = Producto::where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->paginate(12);
        $tipos = Producto::select('tipo_id')->where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $categorias = Producto::select('categoria_id')->where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();

        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'));
    }

    public function filtroPresentacion($presentacion, $busqueda = null){
        $productos = Producto::where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->paginate(12);;
        $tipos = Producto::select('tipo_id')->where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $categorias = Producto::select('categoria_id')->where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();

        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'));
    }

    
   
}
