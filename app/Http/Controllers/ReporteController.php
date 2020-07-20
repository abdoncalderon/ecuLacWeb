<?php

namespace App\Http\Controllers;
use App\Factura;
use App\Producto;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){

        return view('reportes.index');
    }

    public function ventas(){
        $totalVentas = Factura::sum('subtotal');
        $cantidadVentas = Factura::count();
        $facturas = Factura::where('id','!=',0)->paginate(20);
        return view('reportes.ventas.index')
        ->with(compact('totalVentas'))
        ->with(compact('cantidadVentas'))
        ->with(compact('facturas'));
    }

    public function inventario(){
        $productos = Producto::all();
        $totalProductos = 0;
        $cantidadProductos = 0;
        foreach($productos as $producto){
            $totalProductos = $totalProductos + ($producto->precioUnitario * $producto->existenciaActual);
            $cantidadProductos = $cantidadProductos + $producto->existenciaActual;
        }
        $productos =Producto::where('id','!=',0)->paginate(20);
        return view('reportes.inventario.index')
        ->with(compact('totalProductos'))
        ->with(compact('cantidadProductos'))
        ->with(compact('productos'));
    }
}
