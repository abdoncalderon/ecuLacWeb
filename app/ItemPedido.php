<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class ItemPedido extends Model
{
    protected $table = 'items_pedidos';

    protected $fillable = ['pedido_id','producto_id','cantidad','precioUnitario','descuento','iva','subtotal'];

    

    static public function producto(ItemPedido $itemPedido){
        $producto = Producto::find($itemPedido->producto_id);
        return $producto;
    }

    static public function estado($itemPedidoId, $estado){
        $fecha = Carbon::now()->toDateTimeString();
        switch($estado){
            case 'CONFIRMADO': 
                ItemPedido::where('id',$itemPedidoId)->update([
                    'estado'=>$estado,
                    'fechaConfirmacion'=>$fecha,
                ]);
                break;
            case 'DESPACHADO': 
                ItemPedido::where('id',$itemPedidoId)->update([
                    'estado'=>$estado,
                    'fechaDespacho'=>$fecha,
                ]);
                break;
            case 'ENTREGADO': 
                ItemPedido::where('id',$itemPedidoId)->update([
                    'estado'=>$estado,
                    'fechaEntrega'=>$fecha,
                ]);
                break;
        }
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

