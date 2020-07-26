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
    public function vendedor(Request $request){ 
        if (count($request->all())>0){
            $desde = $request->get('desde');
            $hasta = $request->get('hasta');
            $fecha = $request->get('fecha');
            
            if ($desde <= $hasta){
                switch ($fecha){
                    case 2: 
                        $pedidos = Pedido::Where(function($query) {
                                            $query->where('vendedor_id',auth()->id())
                                                ->orWhere('vendedor_id',NULL);
                                            })->whereBetween('fechaConfirmacion',[$desde,$hasta])
                                            ->orderBy('created_at','DESC')
                                            ->paginate(10);
                        break;
                    case 3: 
                        $pedidos = Pedido::Where(function($query) {
                                            $query->where('vendedor_id',auth()->id())
                                                ->orWhere('vendedor_id',NULL);
                                            })->whereBetween('fechaDespacho',[$desde,$hasta])
                                            ->orderBy('created_at','DESC')
                                            ->paginate(10);

                        break;
                    case 4: 
                        $pedidos = Pedido::Where(function($query) {
                                            $query->where('vendedor_id',auth()->id())
                                                ->orWhere('vendedor_id',NULL);
                                            })->whereBetween('fechaEntrega',[$desde,$hasta])
                                            ->orderBy('created_at','DESC')
                                            ->paginate(10);
                        break;
                    default: 
                        $pedidos = Pedido::Where(function($query) {
                                            $query->where('vendedor_id',auth()->id())
                                                ->orWhere('vendedor_id',NULL);
                                            })->whereBetween('fechaCreacion',[$desde,$hasta])
                                            ->orderBy('created_at','DESC')
                                            ->paginate(10);
                        break;
                }
            }else{
                return back()->withErrors(__('messages.dateRange'));
            }
        }else{
            $pedidos = Pedido::where('vendedor_id',auth()->id())
                                ->orWhere('vendedor_id',NULL)
                                ->orderBy('created_at','DESC')
                                ->paginate(10);
        }
        return view('pedidos.vendedor.index')
        ->with(compact('pedidos'));
    }

    public function repartidor(Request $request){
        if (count($request->all())>0){
            $desde = $request->get('desde');
            $hasta = $request->get('hasta');
            $fecha = $request->get('fecha');
            
            if ($desde <= $hasta){
                switch ($fecha){
                    case 2: 
                        $pedidos = Pedido::where('repartidor_id',auth()->id())
                                            ->Where('estado','=','DESPACHADO')
                                            ->whereBetween('fechaDespacho',[$desde,$hasta])
                                            ->orderBy('created_at','DESC')
                                            ->paginate(10);
                        break;
                    case 3: 
                        $pedidos = Pedido::where('repartidor_id',auth()->id())
                                            ->Where('estado','=','ENTREGADO')
                                            ->whereBetween('fechaEntrega',[$desde,$hasta])
                                            ->orderBy('created_at','DESC')
                                            ->paginate(10);
                        break;
                    default: 
                        $pedidos = Pedido::Where('estado','=','CONFIRMADO')
                                            ->whereBetween('fechaConfirmacion',[$desde,$hasta])
                                            ->orderBy('created_at','DESC')
                                            ->paginate(10);
                        break;
                }
            }else{
                return back()->withErrors(__('messages.dateRange'));
            }
        }else{
            $pedidos = Pedido::where(function($query){
                                $query->where('repartidor_id',auth()->id())
                                    ->orWhere('repartidor_id', null);
                                })->where('estado','!=','ABIERTO')->orderBy('created_at','DESC')->paginate(10);    
        }
        return view('pedidos.repartidor.index')
        ->with(compact('pedidos'));
    }

    public function showOrder(Pedido $pedido){
        $itemsPedido = Pedido::items($pedido->id);
        return view('pedidos.vendedor.show')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'));
    }

    public function showDelivery(Pedido $pedido){
        $itemsPedido = Pedido::items($pedido->id);
        return view('pedidos.repartidor.show')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'));
    }

    public function edit(Pedido $pedido){
        $itemsPedido = Pedido::items($pedido->id);
        return view('pedidos.edit')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'));
    }

    public function update(Pedido $pedido){
        $itemsPedido = Pedido::items($pedido->id);
        return view('pedidos.update')
        ->with(compact('pedido'))
        ->with(compact('itemsPedido'));
    }

    public function create(){
        $clientes = User::select('users.id as user','users.nombreCompleto')
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
            return redirect()->route('pedidos.vendedor');
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


    public function change($pedidoId, $estado){
        $fecha = Carbon::now()->toDateTimeString();
        switch($estado){
            case 'DESPACHADO': 
                Pedido::where('id',$pedidoId)->update([
                    'estado'=>$estado,
                    'fechaDespacho'=>$fecha,
                    'repartidor_id'=>auth()->id(),
                ]);
                break;
            case 'ENTREGADO': 
                Pedido::where('id',$pedidoId)->update([
                    'estado'=>$estado,
                    'fechaEntrega'=>$fecha,
                    'repartidor_id'=>auth()->id(),
                ]);
                break;
        }
        return redirect()->route('pedidos.repartidor');
    }
}
