<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Http\Requests\StorePedidoRequest;
use Illuminate\Support\Facades\DB;



class PedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::where('vendedor_id',auth()->id())->orWhere('vendedor_id',NULL)->paginate(10);
        return view('pedidos.index')
        ->with(compact('pedidos'));
    }

    public function show(Pedido $pedido){
        
        /* $pedido = Pedido::find($pedidoId); */
        $itemsPedido = Pedido::items($pedido->id);
        return view('pedidos.show')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'));
    }

    public function create(){
        $clientes = DB::table('users')
                    ->select('users.id as user','users.nombreCompleto')
                    ->join('roles','users.rol_id','=','roles.id')
                    ->where('roles.esExterno',1)
                    ->get();
        return view('pedidos.create')
        ->with(compact('clientes'));
    }

    public function store(StorePedidoRequest $request)
    {
        if (Pedido::abierto($request->input('cliente_id'))==0){
            Pedido::create($request->validated());
            return redirect()->route('pedidos.index');
        }else{
            return back()->withErrors(__('messages.orderExist'));
        }
        
    }

    public function destroy(){
        
    }       
   
}
