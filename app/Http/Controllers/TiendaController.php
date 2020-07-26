<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Categoria;
use App\ImagenProducto;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function busqueda(Request $request){
        $busqueda = $request->input('busqueda');
        $orden = $request->input('orden');
        return redirect()->route('tienda.catalogo',['busqueda'=>$busqueda, 'orden'=>$orden]);
    }

    public function catalogo($orden = null, $busqueda = null){
        
        if(empty($busqueda)){
            $productos = Producto::where('id','!=','0')->orderBy($this->campo($orden), $this->forma($orden))->paginate(12);
            $categorias= Producto::select('categoria_id')->distinct()->get();
            $tipos= Producto::select('tipo_id')->distinct()->get();
            $presentaciones= Producto::select('presentacion_id')->distinct()->get();
        }else{
            $productos = Producto::where('nombre','like', '%'.$busqueda.'%')->orderBy($this->campo($orden), $this->forma($orden))->paginate(12);
            $categorias = Producto::select('categoria_id')->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
            $tipos = Producto::select('tipo_id')->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
            $presentaciones = Producto::select('presentacion_id')->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        }
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'))
        ->with(compact('orden'));
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
        $orden = null;
        $productos = Producto::where('id','!=',0)->orderBy('precioUnitario','ASC')->paginate(12);
        $categorias = Producto::select('categoria_id')->where('id','!=',0)->distinct()->get();
        $tipos = Producto::select('tipo_id')->where('id','!=',0)->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('id','!=',0)->distinct()->get();
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'))
        ->with(compact('orden'));
    }

    public function filtroDestacados(){
        $busqueda = null;
        $orden = null;
        $productos = Producto::where('esDestacado',1)->orderBy('precioUnitario','ASC')->paginate(12);
        $categorias = Producto::select('categoria_id')->where('esDestacado',1)->distinct()->get();
        $tipos = Producto::select('tipo_id')->where('esDestacado',1)->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('esDestacado',1)->distinct()->get();
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'))
        ->with(compact('orden'));
    }

    public function filtroCategoria($categoria, $orden = null, $busqueda = null){
       
        $productos = Producto::where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->orderBy($this->campo($orden), $this->forma($orden))->paginate(12);
        $categorias = Producto::select('categoria_id')->where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $tipos = Producto::select('tipo_id')->where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('categoria_id','=',$categoria)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        
        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'))
        ->with(compact('orden'));
    }

    public function filtroTipo($tipo, $orden = null, $busqueda = null){
        $productos = Producto::where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->orderBy($this->campo($orden), $this->forma($orden))->paginate(12);
        $tipos = Producto::select('tipo_id')->where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $categorias = Producto::select('categoria_id')->where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('tipo_id','=',$tipo)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();

        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'))
        ->with(compact('orden'));
    }

    public function filtroPresentacion($presentacion, $orden = null, $busqueda = null){
        $productos = Producto::where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->orderBy($this->campo($orden), $this->forma($orden))->paginate(12);;
        $tipos = Producto::select('tipo_id')->where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $categorias = Producto::select('categoria_id')->where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();
        $presentaciones = Producto::select('presentacion_id')->where('presentacion_id','=',$presentacion)->where('nombre','like', '%'.$busqueda.'%')->distinct()->get();

        return view('tienda.catalogo')
        ->with(compact('productos'))
        ->with(compact('categorias'))
        ->with(compact('tipos'))
        ->with(compact('presentaciones'))
        ->with(compact('busqueda'))
        ->with(compact('orden'));
    }

    private function campo($orden){
        if(! empty($orden)){
            switch ($orden){
                case 1:
                    $campo = 'precioUnitario';
                    break;
                case 2:
                    $campo = 'precioUnitario';
                    break;
                case 3:
                    $campo = 'esDestacado';
                    break;
            }
        }else{
            $campo = 'precioUnitario';
        }
        return $campo;
    }

    private function forma($orden){
        if(! empty($orden)){
            switch ($orden){
                case 1:
                    $forma = 'ASC';
                    break;
                case 2:
                    $forma = 'DESC';
                    break;
                case 3:
                    $forma = 'DESC';
                    break;
            }
        }else{
            $forma= 'ASC';
        }
        return $forma;
    }
   
}
