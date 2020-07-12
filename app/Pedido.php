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
        $hoy=Carbon::now()->toDateTimeString();
        $cliente=auth()->id();
        Pedido::create([
            'fechaCreacion'=> $hoy,
            'cliente_id'=>$cliente,
        ]);
    }

    static public function total($pedidoId){
        $itemsPedido = Pedido::items($pedidoId);
        $total=0;
        foreach ($itemsPedido as $item){
            $total=$total+$item->subtotal;
        }
        return $total;
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
    
}
