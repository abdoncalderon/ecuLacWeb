<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MovimientoExistencia extends Model
{
    protected $table = 'movimientos_existencias';

    protected $fillable = ['fecha','usuario_id','producto_id','sucursal_id','tipoMovimiento','cantidad'];

    static public function movimiento($tipoMovimiento, $clienteId, $productoId, $cantidad){
        $ciudadClienteId = Cliente::where('usuario_id',$clienteId)->first()->ciudad_id;
        $sucursal = Sucursal::where('ciudad_id',$ciudadClienteId)->first();
        if (empty($sucursal)){
            $sucursal = Sucursal::all()->first();
        }
        $sucursalId = $sucursal->id;
        $movimiento = MovimientoExistencia::where('producto_id',$productoId)->where('sucursal_id',$sucursalId)->latest()->first();
        if (empty($movimiento)){
            $saldo = 0;
        }else{
            $saldo = $movimiento->saldo;
        }
        $fecha = Carbon::now()->toDateTimeString();
        switch ($tipoMovimiento){
            case 'REPOSICION':
                $saldo = $saldo + $cantidad;
                break;
            case 'VENTA':
                $saldo = $saldo - $cantidad;
                break;
            case 'CANCELACION':
                $saldo = $saldo + $cantidad;
                break;
        }
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
