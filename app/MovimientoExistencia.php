<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MovimientoExistencia extends Model
{
    protected $table = 'movimientos_existencias';

    protected $fillable = ['fecha','usuario_id','producto_id','sucursal_id','tipoMovimiento','cantidad','saldo'];

    static public function sucursal($sucursalId){
        $sucursal = Sucursal::find($sucursalId);
        return $sucursal->nombre;
    }

    static public function usuario($usuarioId){
        $usuario = User::find($usuarioId);
        return $usuario->nombreCompleto;
    }

    static public function reposicion($sucursalId, $productoId, $cantidad){
        $fecha = Carbon::now()->toDateTimeString();
        $movimiento = MovimientoExistencia::where('producto_id',$productoId)->where('sucursal_id',$sucursalId)->orderBy('id','DESC')->first();
        
        if (empty($movimiento)){
            $saldo = 0;
        }else{
            $saldo = $movimiento->saldo + $cantidad;
        }
        $tipoMovimiento = 'REPOSICION';
        MovimientoExistencia::create([
            'fecha'=>$fecha,
            'usuario_id'=>auth()->id(),
            'producto_id'=>$productoId,
            'sucursal_id'=>$sucursalId,
            'tipMovimiento'=>$tipoMovimiento,
            'cantidad'=>$cantidad,
            'saldo' => $saldo,
        ]);
    }

    static public function venta($clienteId, $productoId, $cantidad){
        $cliente = Cliente::where('usuario_id',$clienteId)->first();
        $ciudadClienteId = $cliente->ciudad_id;
        $sucursal = Sucursal::where('ciudad_id',$ciudadClienteId)->first();
        if (empty($sucursal)){
            $sucursal = Sucursal::all()->first();
        }
        $sucursalId = $sucursal->id;
        $movimiento = MovimientoExistencia::where('producto_id',$productoId)->where('sucursal_id',$sucursalId)->latest()->first();
        if (empty($movimiento)){
            $saldo = 0;
        }else{
            $saldo = $movimiento->saldo-$cantidad;
        }
        $fecha = Carbon::now()->toDateTimeString();
        $tipoMovimiento = 'VENTA';
        MovimientoExistencia::create([
            'fecha'=>$fecha,
            'usuario_id'=>auth()->id(),
            'producto_id'=>$productoId,
            'sucursal_id'=>$sucursalId,
            'tipMovimiento'=>$tipoMovimiento,
            'cantidad'=>$cantidad,
            'saldo' => $saldo,
        ]);
        
    }

    static public function cancelacion($clienteId, $productoId, $cantidad){
        $cliente = Cliente::where('usuario_id',$clienteId)->first();
        $ciudadClienteId = $cliente->ciudad_id;
        $sucursal = Sucursal::where('ciudad_id',$ciudadClienteId)->first();
        if (empty($sucursal)){
            $sucursal = Sucursal::all()->first();
        }
        $sucursalId = $sucursal->id;
        $movimiento = MovimientoExistencia::where('producto_id',$productoId)->where('sucursal_id',$sucursalId)->latest()->first();
        if (empty($movimiento)){
            $saldo = 0;
        }else{
            $saldo = $movimiento->saldo+$cantidad;
        }
        $fecha = Carbon::now()->toDateTimeString();
        $tipoMovimiento = 'VENTA';
        MovimientoExistencia::create([
            'fecha'=>$fecha,
            'usuario_id'=>auth()->id(),
            'producto_id'=>$productoId,
            'sucursal_id'=>$sucursalId,
            'tipMovimiento'=>$tipoMovimiento,
            'cantidad'=>$cantidad,
            'saldo' => $saldo,
        ]);
        
    }


}
