<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Pedido;
use App\ItemPedido;
use App\Http\Requests\StoreItemPedidoRequest;

use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
    public function index(){
        $pedidoAbierto = Pedido::abierto(auth()->id());
        $itemsPedido = Pedido::items($pedidoAbierto);
        $pedido = Pedido::find($pedidoAbierto);
        return view('itemspedidos.index')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'));
    }

    public function store(Request $request, Producto $producto){
       
        if (!empty($request->input('cantidad'))){
            
            if(Pedido::abierto(auth()->id())==0){
                Pedido::crear();
            }
            $cantidad=$request->input('cantidad');
            $pedidoAbierto = Pedido::abierto(auth()->id());

            $subtotal = $cantidad * $producto->precioUnitario;
           
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
            return redirect()->route('home');
        }else{
            return back()->withErrors(__('messages.fieldEmpty'));
        }
        
    }

    public function destroy($id){
        $item=ItemPedido::find($id);
        $item->delete();
        Producto::actualizarExistencia($item->producto_id,'CANCELACION',$item->cantidad);
        return redirect()->route('itemspedidos.index');
    }

}
