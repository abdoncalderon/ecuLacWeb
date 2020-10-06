<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['fechaCreacion','fechaConfirmacion','FechaDespacho','FechaEntrega','cliente_id','vendedor_id','repartidor_id','estado',];

    static public function abierto($clienteId){
        $pedido = Pedido::where('cliente_id',$clienteId)->where('estado','ABIERTO')->first();
        if (empty($pedido)){
            return 0;
        }else{
            return $pedido->id;
        }
    }

    static public function itemsPedidoAbierto($pedidoAbierto){
        $itemsPedido = ItemPedido::where('pedido_id',$pedidoAbierto)->get();
        return $itemsPedido;
    }

    static public function crear(){
        $fecha=Carbon::now()->toDateTimeString();
        $cliente=auth()->id();
        Pedido::create([
            'fechaCreacion'=>$fecha,
            'cliente_id'=>$cliente,
        ]);
    }

    public function items(){
        return $this->hasMany(ItemPedido::class);
    }


    public function total(){
        return $this->subtotal() + $this->valorIva();
    }
    
    public function subtotal(){
        $total = 0;
        foreach ($this->items as $item){
            $total=$total+$item->subtotal;
        }
        return $total;
    }
    
    public function valorDescuento(){
        $valorDescuento = 0;
        foreach ($this->items as $item){
            $valorDescuento = $valorDescuento + $item->producto->valorDescuento();
        }
        return $valorDescuento;
    }

    public function valorIva(){
        $valorIva = 0;
        foreach ($this->items as $item){
            $valorIva = $valorIva + $item->producto->valorIva();
        }
        return $valorIva;
    }

    public function cantidades(){
        $cantidades = 0;
        foreach ($this->items as $item){
            $cantidades = $cantidades + $item->cantidad;
        }
        return $cantidades;
    }
    
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    
    public function vendedor(){
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function repartidor(){
        return $this->belongsTo(User::class, 'repartidor_id');
    }
    
    public function itemsEstado($estado){
        $itemsEstado = true;
        foreach ($this->items as $item){
            if($item->estado!=$estado){
                $itemsEstado = false;
            break;
            }
        }
        return $itemsEstado;
    }
    
}
