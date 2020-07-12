@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pedidos.index')}}">{{ __('content.order') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.open') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')
    <div style="padding: 5px 10px; font-size: 1.5em;">{{ __('content.order') }} {{ $pedido->estado }} {{ $pedido->cliente($pedido->cliente_id)}}</div>
    <div class="pedido">
        
        <div class="items">
            <div class="titulo">
                <div class="orden">{{ __('content.items').' '.__('content.order').': '.count($itemsPedido) }}</div>
                <div class="precio">{{ __('content.price').' x '.__('content.unity') }}</div>
            </div>
            @foreach ($itemsPedido as $item)
                <article class="item">
                    <div class="imagen" style="background-image: url({{ asset('img/productos/'.$item->producto($item->id)->imagenPredeterminada($item->producto_id)) }})"></div>
                    <div class="detalles">
                        <div>
                            <div class="nombre">{{ $item->producto($item->id)->nombre}}</div>
                            <div class="descripcion">{{ $item->producto($item->id)->descripcion}}</div>
                        </div>
                        <div class="estado">{{ $item->producto($item->id)->estado}}</div>
                        <div class="cantidad">{{ __('content.quantity').': '.$item->cantidad.' '.__('content.unities') }}</div>
                    </div>
                    <div>
                        <div class="precio">{{ __('content.currency').' '.$item->precioUnitario }}</div>
                        <a class="eliminar" href="{{ route('itemspedidos.destroy',$item->id) }}">{{ __('content.delete') }}</a>
                    </div>
                    
                </article>
            @endforeach
        </div>
        <div class="resumen">
            <div class="total">Total</div>
            <div class="productos">{{ count($itemsPedido).' '.__('content.products')}}</div>
            <div class="valor">{{ __('content.currency') }} {{ $pedido->total($pedido->id) }}</div>
            <a class="pagar" href="#">{{ __('content.add') }} {{ __('content.products') }}</a>
            <a class="seguir" href="{{ route('home') }}">{{ __('content.cancel') }} {{ __('content.order') }}</a>
        </div>
    </div>
    
@endsection