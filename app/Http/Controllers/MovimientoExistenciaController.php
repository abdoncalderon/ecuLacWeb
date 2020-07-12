<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovimientoExistenciaRequest;
use App\MovimientoExistencia;
use App\Producto;
use App\Sucursal;
use Illuminate\Http\Request;

class MovimientoExistenciaController extends Controller
{
    
    public function index(){
        return view('movimientosexistencias.index');
    }
    
    public function create(Producto $producto){

        $sucursales=Sucursal::all();
        return view('movimientosexistencias.create')
        ->with(compact('producto'))
        ->with(compact('sucursales'));
    }

    public function store(StoreMovimientoExistenciaRequest $request){
        $producto = Producto::find($request->input('producto_id'));
        if ($producto->existenciaActual>=$request->input('cantidad')){
            MovimientoExistencia::create($request->validated());
            Producto::actualizarExistencia($request->input('producto_id'),$request->input('tipoMovimiento'),$request->input('cantidad'));
            return redirect()->route('productos.index');
        }else{
            return back()->withErrors(__('messages.noStock'));
        }
        
    }
}
