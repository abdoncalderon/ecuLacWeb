<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Pedido;
use App\ItemPedido;
use App\Http\Requests\StoreItemPedidoRequest;



class ItemPedidoController extends Controller
{
    public function index(){
        $pedidoAbierto = Pedido::abierto(auth()->id());
        $itemsPedido = Pedido::items($pedidoAbierto);
        $pedido = Pedido::find($pedidoAbierto);
        return view('clientes.pedido')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'));
    }

    public function store(StoreItemPedidoRequest $request){
        if (!empty($request->input('cantidad'))){
            
            if(Pedido::abierto($request->input('cliente_id'))==0){
                Pedido::crear();
            }
            $cantidad=$request->input('cantidad');
            $pedidoAbierto = Pedido::abierto($request->input('cliente_id'));
            $producto = Producto::find($request->input('producto_id'));
            $subtotal = $cantidad * $producto->precioDescuento($producto->id);
           
            ItemPedido::create([
                'pedido_id'=>$pedidoAbierto,
                'producto_id'=>$producto->id,
                'cantidad'=>$cantidad,
                'precioUnitario'=>$producto->precioUnitario,
                'descuento'=>$producto->descuento,
                'iva'=>$producto->iva,
                'subtotal'=>$subtotal,
            ]);
            Producto::actualizarExistencia($producto->id,'VENTA',$cantidad);
            return back();
        }else{
            return back()->withErrors(__('messages.fieldEmpty'));
        }
        
    }

    public function destroy($id){
        $itemPedido = ItemPedido::find($id);
        ItemPedido::eliminar($itemPedido);
        return back();
    }

}
