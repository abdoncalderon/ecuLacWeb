<?php

namespace App\Http\Controllers;
use App\Factura;
use App\Producto;
use App\Categoria;
use App\User;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){

        return view('reportes.index');
    }

    public function ventas(Request $request){

        $vendedores = User::where('rol_id',3)->get();
        if (count($request->all())>0){
            $desde = $request->get('desde');
            $hasta = $request->get('hasta');
            $vendedor = $request->get('vendedor');
            if ($vendedor == null){
                $totalVentas = Factura::whereBetween('fecha',[$desde,$hasta])->sum('subtotal');
                $cantidadVentas = Factura::whereBetween('fecha',[$desde,$hasta])->count();
                $facturas = Factura::whereBetween('fecha',[$desde,$hasta])->paginate(20);
            }else{
                $totalVentas = Factura::join('pedidos','facturas.pedido_id','=','pedidos.id')->where('pedidos.vendedor_id',$vendedor)->whereBetween('fecha',[$desde,$hasta])->sum('subtotal');
                $cantidadVentas = Factura::join('pedidos','facturas.pedido_id','=','pedidos.id')->where('pedidos.vendedor_id',$vendedor)->whereBetween('fecha',[$desde,$hasta])->count();
                $facturas = Factura::join('pedidos','facturas.pedido_id','=','pedidos.id')->where('pedidos.vendedor_id',$vendedor)->whereBetween('fecha',[$desde,$hasta])->paginate(20);
            }
        }else{
            $totalVentas = Factura::sum('subtotal');
            $cantidadVentas = Factura::count();
            $facturas = Factura::where('id','!=',0)->paginate(20);
        }
        return view('reportes.ventas.index')
        ->with(compact('totalVentas'))
        ->with(compact('cantidadVentas'))
        ->with(compact('vendedores'))
        ->with(compact('facturas'));
    }

    public function inventario(Request $request){
        $categorias = Categoria::all();
        if (count($request->all())>0){
            $categoria = $request->get('categoria');
            if ($categoria == null){
                $productos =Producto::where('id','!=',0)->paginate(20);
            }else{
                $productos = Producto::where('Categoria_id',$categoria)->paginate(20);
            }
        }else{
            $productos =Producto::where('id','!=',0)->paginate(20);
        }
        $totalProductos = 0;
        $cantidadProductos = 0;
        foreach($productos as $producto){
            $totalProductos = $totalProductos + ($producto->precioUnitario * $producto->existenciaActual);
            $cantidadProductos = $cantidadProductos + $producto->existenciaActual;
        }
       
        return view('reportes.inventario.index')
        ->with(compact('totalProductos'))
        ->with(compact('cantidadProductos'))
        ->with(compact('categorias'))
        ->with(compact('productos'));
    }
}
