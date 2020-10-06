<?php

namespace App\Http\Controllers;
use App\Factura;
use App\Producto;
use App\Categoria;
use App\User;
use PDF;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /*************************************************************************************************************************/
    public function index(){
        return view('reportes.index');
    }

    /*************************************************************************************************************************/
    public function ventas(Request $request){
        if ($request->has('imprimir')){
            $itemsXpagina = Factura::all()->count();
        }else{
            $itemsXpagina = 5;
        }
        $vendedores = User::where('rol_id',3)->get();
        
        if (($request->has('desde'))||($request->has('hasta'))||($request->has('vendedor'))){
            $desde = $request->get('desde');
            $hasta = $request->get('hasta');
            $vendedor = $request->get('vendedor');
            if ($vendedor == null){
                $totalVentas = Factura::whereBetween('fecha',[$desde,$hasta])->sum('subtotal');
                $cantidadVentas = Factura::whereBetween('fecha',[$desde,$hasta])->count();
                $facturas = Factura::whereBetween('fecha',[$desde,$hasta])->paginate($itemsXpagina);
            }else{
                $totalVentas = Factura::join('pedidos','facturas.pedido_id','=','pedidos.id')->where('pedidos.vendedor_id',$vendedor)->whereBetween('fecha',[$desde,$hasta])->sum('subtotal');
                $cantidadVentas = Factura::join('pedidos','facturas.pedido_id','=','pedidos.id')->where('pedidos.vendedor_id',$vendedor)->whereBetween('fecha',[$desde,$hasta])->count();
                $facturas = Factura::join('pedidos','facturas.pedido_id','=','pedidos.id')->where('pedidos.vendedor_id',$vendedor)->whereBetween('fecha',[$desde,$hasta])->paginate($itemsXpagina);
            }
            
        }else{
            $facturas = Factura::where('id','!=',0)->paginate($itemsXpagina);
            $totalVentas = Factura::sum('subtotal');
            $cantidadVentas = Factura::count();
        }

        if ($request->has('imprimir')){
            $pdf=PDF::loadView('reportes.ventas.print',[
                'facturas'=>$facturas,
                'totalVentas'=>$totalVentas,
                'cantidadVentas'=>$cantidadVentas,
                'desde'=>$desde,
                'hasta'=>$hasta,
                ]);
            $pdf->setPaper('a4','landscape');
            return $pdf->stream();
        }else{
            return view('reportes.ventas.index')
            ->with(compact('totalVentas'))
            ->with(compact('cantidadVentas'))
            ->with(compact('vendedores'))
            ->with(compact('facturas'));
        }
    }

    /*************************************************************************************************************************/
    public function inventario(Request $request){
        if ($request->has('imprimir')){
            $itemsXpagina = Factura::all()->count();
        }else{
            $itemsXpagina = 5;
        }
        $categorias = Categoria::all();
        if (count($request->all())>0){
            
            $categoria = $request->get('categoria');
            if ($categoria == null){
                $productos =Producto::where('id','!=',0)->paginate($itemsXpagina);
            }else{
                $productos = Producto::where('Categoria_id',$categoria)->paginate($itemsXpagina);
            }
        }else{
            $productos = Producto::where('id','!=',0)->paginate($itemsXpagina);
        }

        $totalProductos = 0;
        $cantidadProductos = 0;
        foreach($productos as $producto){
            $totalProductos = $totalProductos + ($producto->precioUnitario * $producto->existenciaActual);
            $cantidadProductos = $cantidadProductos + $producto->existenciaActual;
        }
       
        if ($request->has('imprimir')){
            $pdf=PDF::loadView('reportes.inventario.print',[
                'productos'=>$productos,
                'totalPOroductos'=>$totalProductos,
                'cantidadProductos'=>$cantidadProductos,
                ]);
            $pdf->setPaper('a4','landscape');
            return $pdf->stream();
        }else{
            return view('reportes.inventario.index')
            ->with(compact('totalProductos'))
            ->with(compact('cantidadProductos'))
            ->with(compact('categorias'))
            ->with(compact('productos'));
        }
        
    }
}
