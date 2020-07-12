<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'items_pedidos';

    protected $fillable = ['pedido_id','producto_id','cantidad','precioUnitario','descuento','iva','subtotal'];

    

    public function producto($itemPedidoId){
        $item = ItemPedido::find($itemPedidoId);
        $producto = Producto::find($item->producto_id);
        return $producto;
    }

}
