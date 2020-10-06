<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Pedido;
use App\User;
use App\Ciudad;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;
use Exception;
class ClienteController extends Controller
{
    /*************************************************************************************************************************/
    public function cuenta(){
        $cliente = Cliente::select('users.id as id','users.nombreCompleto as nombreCompleto','users.cedula as cedula','users.telefono as telefono','users.email as email','users.usuario as usuario','users.created_at as creadoEn','ciudades.nombre as ciudad', 'clientes.direccion as direccion')
            ->join('users','clientes.usuario_id','=','users.id')
            ->join('ciudades','clientes.ciudad_id','=','ciudades.id')
            ->where('clientes.usuario_id',auth()->id())
            ->first();
        return view('clientes.cuenta')
        ->with(compact('cliente'));
    }

    /*************************************************************************************************************************/
    public function historial(Request $request){
        if (count($request->all())>0){
            $desde = $request->get('desde');
            $hasta = $request->get('hasta');
            $estado = $request->get('estado');
            
            if ($desde <= $hasta){
                if($estado!=null){
                    switch ($estado){
                        case 2: 
                            $pedidos = Pedido::where('cliente_id',auth()->id())
                                                ->Where('estado','=','CONFIRMADO')
                                                ->whereBetween('fechaConfirmacion',[$desde,$hasta])
                                                ->orderBy('created_at','DESC')
                                                ->paginate(10);
                            break;
                        case 3: 
                            $pedidos = Pedido::where('cliente_id',auth()->id())
                                                ->Where('estado','=','DESPACHADO')
                                                ->whereBetween('fechaDespacho',[$desde,$hasta])
                                                ->orderBy('created_at','DESC')
                                                ->paginate(10);
                            break;
                        case 4: 
                            $pedidos = Pedido::where('cliente_id',auth()->id())
                                                ->Where('estado','=','ENTREGADO')
                                                ->whereBetween('fechaEntrega',[$desde,$hasta])
                                                ->orderBy('created_at','DESC')
                                                ->paginate(10);
                            break;
                        default: 
                            $pedidos = Pedido::where('cliente_id',auth()->id())
                                                ->Where('estado','=','ABIERTO')
                                                ->whereBetween('fechaCreacion',[$desde,$hasta])
                                                ->orderBy('created_at','DESC')
                                                ->paginate(10);
                            break;
                    }
                }else{
                    $pedidos = Pedido::where('cliente_id',auth()->id())
                    ->whereBetween('fechaCreacion',[$desde,$hasta])
                    ->orderBy('created_at','DESC')
                    ->paginate(10);
                }
            }else{
                return back()->withErrors(__('messages.dateRange'));
            }
        }else{
            $pedidos = Pedido::where('cliente_id',auth()->id())->orderBy('id','DESC')->get();
        }
        return view('clientes.historial')
        ->with(compact('pedidos'));
    }

    /*************************************************************************************************************************/
    public function pedido(){
        $pedidoAbierto = Pedido::abierto(auth()->id());
        if($pedidoAbierto == 0){
            return back()->withErrors(__('messages.noOrder'));
        }else{
            $pedido = Pedido::find($pedidoAbierto);
            return view('clientes.pedido')
            ->with(compact('pedido'));
        }
    }

    /*************************************************************************************************************************/
    public function preorden(Pedido $pedido){
        return view('clientes.preorden')
            ->with(compact('pedido'));
    }

    /*************************************************************************************************************************/
    public function edit($clienteId){
        $ciudades = Ciudad::all();
        $cliente = Cliente::join('users','clientes.usuario_id','=','users.id')
        ->where('clientes.usuario_id',auth()->id())
        ->first();
        return view('clientes.perfil')
        ->with(compact('ciudades'))
        ->with(compact('cliente'));
    }

    /*************************************************************************************************************************/
    public function update(UpdateClienteRequest $request, $clienteId){
        try{
            User::where('id',$clienteId)->update([
                'nombreCompleto'=>$request->post('nombreCompleto'),
                'cedula'=>$request->post('cedula'),
                'email'=>$request->post('email'),
                'telefono'=>$request->post('telefono'),
                'usuario'=>$request->post('usuario'),
            ]);
            if($request->has('conUbicacion')){
                Cliente::where('usuario_id',$clienteId)->update([
                    'ciudad_id'=>$request->post('ciudad_id'),
                    'direccion'=>$request->post('direccion'),
                    'latitud'=>$request->post('latitud'),
                    'longitud'=>$request->post('longitud'),
                ]);
            }else{
                Cliente::where('usuario_id',$clienteId)->update([
                    'ciudad_id'=>$request->post('ciudad_id'),
                    'direccion'=>$request->post('direccion'),
                ]);
            }
            return redirect()->route('clientes.cuenta');
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }

    }
}
