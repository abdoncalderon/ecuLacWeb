<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['fecha','pedido_id','subtotal','valorDescuento','valorIva','tipoPago','estado'];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
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

