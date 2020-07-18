<?php

namespace App\Http\Controllers;
/* use Illuminate\Support\Facades\DB; */
use App\Cliente;
use App\Pedido;
use App\ItemPedido;
use App\User;
class ClienteController extends Controller
{
    public function cuenta(){
        $cliente = Cliente::select('users.id as id','users.nombreCompleto as nombreCompleto','users.cedula as cedula','users.telefono as telefono','users.email as email','users.usuario as usuario','users.created_at as creadoEn','ciudades.nombre as ciudad', 'clientes.direccion as direccion')
            ->join('users','clientes.usuario_id','=','users.id')
            ->join('ciudades','clientes.ciudad_id','=','ciudades.id')
            ->where('clientes.usuario_id',auth()->id())
            ->first();
        return view('clientes.cuenta')
        ->with(compact('cliente'));
    }

    public function historial(){
        $pedidos = Pedido::where('cliente_id',auth()->id())->orderBy('id','DESC')->get();
        return view('clientes.historial')
        ->with(compact('pedidos'));
    }

    public function pedido(){
        $pedidoAbierto = Pedido::abierto(auth()->id());
        if($pedidoAbierto == 0){
            return back();
        }else{
            $pedido = Pedido::find($pedidoAbierto);
            $itemsPedido = Pedido::items($pedidoAbierto);
            return view('clientes.pedido')
            ->with(compact('pedido'))
            ->with(compact('itemsPedido'));
        }
    }

    public function preorden(Pedido $pedido){
        $itemsPedido = Pedido::items($pedido->id);
        $cliente = User::join('clientes','users.id','=','clientes.usuario_id')->where('users.id',$pedido->cliente_id)->first();
        return view('clientes.preorden')
            ->with(compact('pedido'))
            ->with(compact('cliente'))
            ->with(compact('itemsPedido'));
    }
}
