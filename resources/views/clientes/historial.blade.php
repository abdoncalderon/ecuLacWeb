                
@extends('layouts.external')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.cuenta')}}">{{ __('messages.myaccount') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.myorders') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')
    <div class="historial">
        @foreach ($pedidos as $pedido)
            <div class="pedido">
                <div class="resumido">
                    <div class="numeracion">{{ __('content.order')}} # {{ $pedido->id }}</div>
                    <div class="estado">{{ $pedido->estado }}</div>
                    <div class="fecha">{{ $pedido->fechaCreacion }}</div>
                    <div class="enviado">{{ $pedido->cliente($pedido->cliente_id) }}</div>
                    <div class="total">Total: {{ $pedido->total($pedido) }}</div>
                </div>                    
                <div class="titulo">
                    <div class="orden">{{ __('content.items').' '.__('content.order').': '.count($pedido->items($pedido->id)) }}</div>
                    <div class="precio">{{ __('content.price').' x '.__('content.unity') }}</div>
                    <div class="subtotal">{{ __('content.subtotal') }}</div>
                </div>

                <div class="items">
                    @foreach ($pedido->items($pedido->id) as $item)
                        <article class="item">
                            <div class="imagen" style="background-image: url({{ asset('img/productos/'.$item->producto($item)->imagenPredeterminada($item->producto_id)) }})"></div>
                            <div class="detalles">
                                <div>
                                    <div class="nombre">{{ $item->producto($item)->nombre}}</div>
                                    <div class="descripcion">{{ $item->producto($item)->descripcion}}</div>
                                </div>
                            </div>
                            <div class="estado">{{ $item->estado }}  {{ Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</div>
                            <div class="cantidad">{{ __('content.quantity').': '.$item->cantidad.' '.__('content.unities') }}</div>
                            <div class="precio">{{ __('content.currency').' '.$item->precioUnitario }}</div>
                            <div class="subtotal">{{ $item->subtotal }}</div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    
@endsection