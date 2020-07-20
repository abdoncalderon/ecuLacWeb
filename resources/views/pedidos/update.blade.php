@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pedidos.repartidor')}}">{{ __('content.deliveries' ) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.update') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ $errors->first() }}
    </div>
    @endif

    <div style="padding: 5px 10px; font-size: 1.5em;">{{ __('content.order') }} {{ $pedido->estado }} {{ $pedido->cliente($pedido->cliente_id)}}</div>
        <div class="pedido">
        
            <div class="items">
                <div class="titulo">
                    <div class="orden">{{ __('content.items').' '.__('content.order').': '.count($itemsPedido) }}</div>
                    <div class="precio">{{ __('content.price').' x '.__('content.unity') }}</div>
                </div>
                @foreach ($itemsPedido as $item)
                    <article class="item">
                        <div class="imagen" style="background-image: url({{ asset('img/productos/'.$item->producto($item)->imagenPredeterminada($item->producto_id)) }})"></div>
                        <div class="detalles">
                            <div>
                                <div class="nombre">{{ $item->producto($item)->nombre}}</div>
                                <div class="descripcion">{{ $item->producto($item)->descripcion}}</div>
                            </div>
                            <div class="estado">{{ $item->producto($item)->estado}}</div>
                            <div class="cantidad">{{ __('content.quantity').': '.$item->cantidad.' '.__('content.unities') }}</div>
                        </div>
                        <div>
                            <div class="precio">{{ __('content.currency').' '.$item->precioUnitario }}</div>
                            <div class="precio">{{ $item->estado }}</div>
                            @if($item->estado=='CONFIRMADO')
                                @if ($pedido->estado=='CONFIRMADO')
                                    <a class="eliminar" href="{{ route('itemspedidos.update',['itempedido'=>$item->id,'estado'=>'DESPACHADO']) }}">{{ __('messages.changeTo') }} {{ __('content.dispatched') }}</a>
                                @endif
                            @elseif($item->estado=='DESPACHADO')
                                @if ($pedido->estado=='DESPACHADO')
                                    <a class="eliminar" href="{{ route('itemspedidos.update',['itempedido'=>$item->id,'estado'=>'ENTREGADO']) }}">{{ __('messages.changeTo') }} {{ __('content.delivered') }}</a>
                                @endif
                            @endif
                        </div>
                        
                    </article>
                @endforeach
            </div>
            <div class="resumen">
                <div class="total">Subtotal</div>
                <div class="productos">{{ count($itemsPedido).' '.__('content.products')}}</div>
                <div class="valor">{{ __('content.currency') }} {{ $pedido->subtotal($pedido->id) }}</div>
                @if($pedido->itemsEstado($pedido, 'DESPACHADO'))
                    <button type="button" class="agregar" data-toggle="modal" data-target="#confirmarModal"> {{ __('content.order') }} {{ __('content.dispatched') }}</button>
                @elseif($pedido->itemsEstado($pedido, 'ENTREGADO'))
                    <button type="button" class="agregar" data-toggle="modal" data-target="#confirmarModal">{{ __('content.order') }} {{ __('content.delivered') }} </button>
                @endif
                <a class="seguir" href="{{ route('pedidos.repartidor') }}">{{ __('messages.backTo') }} {{ __('content.deliveries') }}</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="confirmarModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('content.confirm') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('messages.confirmChangeStatus') }}
                </div>
                <div class="modal-footer">
                    <div class="col-md-6 offset-md-4">
                        @if($pedido->estado=='CONFIRMADO')
                            <a class="btn btn-primary" href="{{ route('pedidos.change',['pedido'=>$pedido->id,'estado'=>'DESPACHADO']) }}">{{ __('content.dispatch') }}</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('pedidos.change',['pedido'=>$pedido->id,'estado'=>'ENTREGADO']) }}">{{ __('content.deliver') }}</a>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection