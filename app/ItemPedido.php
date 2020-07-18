<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'items_pedidos';

    protected $fillable = ['pedido_id','producto_id','cantidad','precioUnitario','descuento','iva','subtotal'];

    

    static public function producto(ItemPedido $itemPedido){
        $producto = Producto::find($itemPedido->producto_id);
        return $producto;
    }

    static public function estado($itemPedidoId, $estado){
        
        ItemPedido::where('id',$itemPedidoId)->update([
            'estado'=>$estado,
        ]);
        
    }

    

    static public function eliminar(ItemPedido $itemPedido){
        $pedido = Pedido::find($itemPedido->pedido_id);
        $productoId = $itemPedido->producto_id;
        $cantidad = $itemPedido->cantidad;
        $itemPedido->delete();
        MovimientoExistencia::cancelacion($pedido->cliente_id, $productoId, $cantidad);
        Producto::actualizarExistencia($productoId,'CANCELACION',$cantidad);
    }

}

