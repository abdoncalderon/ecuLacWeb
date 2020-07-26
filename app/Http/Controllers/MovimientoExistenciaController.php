<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovimientoExistenciaRequest;
use App\MovimientoExistencia;
use App\Producto;
use App\Sucursal;
use Illuminate\Http\Request;

class MovimientoExistenciaController extends Controller
{
    
    public function index(Producto $producto, Request $request){
        $sucursales = Sucursal::all();
        if(count($request->all())>0){
            $desde = $request->get('desde');
            $hasta = $request->get('hasta');
            $sucursal = $request->get('sucursal');
            if ($sucursal == null){
                $movimientosExistencias = MovimientoExistencia::whereBetween('fecha',[$desde,$hasta])->where('producto_id',$producto->id)->paginate(20);
            }else{
                $movimientosExistencias = MovimientoExistencia::whereBetween('fecha',[$desde,$hasta])->where('producto_id',$producto->id)->where('sucursal_id',$sucursal)->paginate(20);
            }
        }else{
            $movimientosExistencias = MovimientoExistencia::where('producto_id',$producto->id)->paginate(10);
        }
        
        return view('movimientosexistencias.index')
        ->with(compact('movimientosExistencias'))
        ->with(compact('sucursales'))
        ->with(compact('producto'));
    }
    
    public function create(Producto $producto){

        $sucursales=Sucursal::all();
        return view('movimientosexistencias.create')
        ->with(compact('producto'))
        ->with(compact('sucursales'));
    }

    public function store(StoreMovimientoExistenciaRequest $request){
        $producto = Producto::find($request->input('producto_id'));
        MovimientoExistencia::reposicion($request->input('sucursal_id'), $request->input('producto_id'), $request->input('cantidad'));
        Producto::actualizarExistencia($request->input('producto_id'),'REPOSICION',$request->input('cantidad'));
        return redirect()->route('movimientosexistencias.index',$producto);
    }
}
