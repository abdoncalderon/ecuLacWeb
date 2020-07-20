<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['fechaCreacion','cliente_id',];

    static public function abierto($clienteId){
        $pedido = Pedido::where('cliente_id',$clienteId)->where('estado','ABIERTO')->first();
        if (empty($pedido)){
            return 0;
        }else{
            return $pedido->id;
        }
    }

    static public function crear()
    {
        $fecha=Carbon::now()->toDateTimeString();
        $cliente=auth()->id();
        Pedido::create([
            'fechaCreacion'=>$fecha,
            'cliente_id'=>$cliente,
        ]);
    }

    static public function total(Pedido $pedido){
        return $pedido->subtotal($pedido->id) + $pedido->valorIva($pedido->id);
    }

    static public function subtotal($pedidoId){
        $itemsPedido = Pedido::items($pedidoId);
        $total=0;
        foreach ($itemsPedido as $item){
            $total=$total+$item->subtotal;
        }
        return $total;
    }

    static public function valorDescuento($pedidoId){
        $itemsPedido = Pedido::items($pedidoId);
        $valorDescuento=0;
        foreach ($itemsPedido as $item){
            $valorDescuento = $valorDescuento + Producto::valorDescuento($item->producto_id);
        }
        return $valorDescuento;
    }

    static public function valorIva($pedidoId){
        $itemsPedido = Pedido::items($pedidoId);
        $valorIva=0;
        foreach ($itemsPedido as $item){
            $valorIva = $valorIva + Producto::valorIva($item->producto_id);
        }
        return $valorIva;
    }

    static public function cantidades($pedidoId){
        $itemsPedido = Pedido::items($pedidoId);
        $cantidades=0;
        foreach ($itemsPedido as $item){
            $cantidades=$cantidades+$item->cantidad;
        }
        return $cantidades;
    }

    static public function cliente($clienteId)
    {
        $cliente = User::find($clienteId);
        return $cliente->nombreCompleto;
    }

    static public function items($pedidoId){
        $items = ItemPedido::where('pedido_id',$pedidoId)->get();
        return $items;
    }

    static public function itemsEstado(Pedido $pedido, $estado){
        $itemsPedido = $pedido::items($pedido->id);
        $itemsEstado = true;
        foreach ($itemsPedido as $item){
            if($item->estado!=$estado){
                $itemsEstado = false;
            break;
            }
        }
        return $itemsEstado;
    }
    
}
