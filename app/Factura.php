<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['fecha','pedido_id','subtotal','valorDescuento','valorIva','tipoPago','estado'];

    static public function cliente($pedidoId){
        $clienteId = Pedido::find($pedidoId)->cliente_id;
        $cliente = User::select('nombreCompleto')->join('clientes','users.id','=','clientes.usuario_id')->where('users.id',$clienteId)->first();
        
        return $cliente;
    }

    static public function pedido($pedidoId){
        $pedido = Pedido::find($pedidoId);
        return $pedido;
    }

    static public function crear(Pedido $pedido, $tipoPago, $estado){
        $fecha = Carbon::now()->toDateTimeString();
        Factura::create([
            'fecha'=>$fecha,
            'pedido_id'=>$pedido->id,
            'subtotal'=>$pedido->subtotal($pedido->id),
            'valorDescuento'=>$pedido->valorDescuento($pedido->id),
            'valorIva'=>$pedido->valorIva($pedido->id),
            'tipoPago'=>$tipoPago,
            'estado'=>$estado,

        ]);
    }
}

