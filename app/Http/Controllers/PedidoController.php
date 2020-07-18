<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\User;
use App\Factura;
use Carbon\Carbon;
use App\Http\Requests\StorePedidoRequest;
use Illuminate\Http\Request;


class PedidoController extends Controller
{
    public function index($vista){
        switch ($vista){
            case 'Pedidos':
                $pedidos = Pedido::where('vendedor_id',auth()->id())->orWhere('vendedor_id',NULL)->paginate(10);
                break;
            case 'Despachos':
                $pedidos = Pedido::where('repartidor_id',auth()->id())->orWhere('estado','!=','ABIERTO')->paginate(10);
                break;
        }
        return view('pedidos.index')
        ->with(compact('pedidos'))
        ->with(compact('vista'));
    }

    public function show($vista, Pedido $pedido){
        
        $itemsPedido = Pedido::items($pedido->id);
        return view('pedidos.show')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'))
        ->with(compact('vista'));
    }

    public function edit($vista, Pedido $pedido){
        
        $itemsPedido = Pedido::items($pedido->id);
        return view('pedidos.edit')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'))
        ->with(compact('vista'));
    }

    public function create($vista){
        $clientes = User::select('users.id as user','users.nombreCompleto')
                    ->join('roles','users.rol_id','=','roles.id')
                    ->where('roles.esExterno',1)
                    ->get();
        return view('pedidos.create')
        ->with(compact('clientes'))
        ->with(compact('vista'));
    }

    public function store(StorePedidoRequest $request, $vista)
    {
        if (Pedido::abierto($request->input('cliente_id'))==0){
            Pedido::create($request->validated());
            return redirect()->route('pedidos.index',$vista);
        }else{
            return back()->withErrors(__('messages.orderExist'));
        }
        
    }

    public function destroy($id){
        $items = Pedido::items($id);
        foreach($items as $item){
            $item->eliminar($item);
        }
        $pedido=Pedido::find($id)->delete();
        return redirect()->route('home');
    }     
    
    public function toPay(Request $request, $id){
        $fecha = Carbon::now()->toDateTimeString();
        if($request->has('efectivo')){
            $tipoPago='EFECTIVO';
            $estado='PAGADA';
        }else{
            $tipoPago='CREDITO';
            $estado='PENDIENTE';
        }
        $items = Pedido::items($id);
        foreach($items as $item){
            $item->estado($item->id, 'CONFIRMADO');
        }
        $pedido = Pedido::find($id);
        Pedido::where('id',$pedido->id)->update([
            'fechaConfirmacion'=>$fecha,
            'estado'=>'CONFIRMADO',
        ]);
        Factura::crear($pedido, $tipoPago, $estado);

        return redirect()->route('home');
    }     
}
