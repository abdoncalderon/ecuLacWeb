@extends('layouts.external')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.order') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contenidoPrincipal')

    {{-- PEDIDO --}}
    <div class="pedido">
        <div class="items">
            <div class="titulo">
                <div class="orden">{{ __('content.items').' '.__('content.order').': '.count($pedido->items) }}</div>
                <div class="precio">{{ __('content.price').' x '.__('content.unity') }}</div>
            </div>

            {{-- ITEMS --}}
            @foreach ($pedido->items as $item)
                <article class="item">
                    <div class="imagen" style="background-image: url({{ asset('img/productos/'.$item->producto->imagenPredeterminada($item->producto_id)) }})"></div>
                    <div class="detalles">
                        <div>
                            <div class="nombre">{{ $item->producto->nombre}}</div>
                            <div class="descripcion">{{ $item->producto->descripcion}}</div>
                        </div>
                        <div class="estado">{{ $item->producto->estado}}</div>
                        <div class="cantidad">{{ __('content.quantity').': '.$item->cantidad.' '.__('content.unities') }}</div>
                    </div>
                    <div>
                        <div class="precio">{{ __('content.currency').' '.$item->precioUnitario }}</div>
                        <div class="descuento">{{ __('content.discount') }} {{ __('content.currency') }} {{ number_format($item->producto->valorDescuento(),2) }}</div>
                        <div class="subtotal">{{ __('content.currency') }} {{ $item->producto->precioDescuento() }}</div>
                        <a class="eliminar" href="{{ route('itemspedidos.destroy',$item->id) }}">{{ __('content.delete') }}</a>
                    </div>
                    
                </article>
            @endforeach
        </div>

        {{-- RESUMEN --}}
        <div class="resumen">
            <div class="total">Total</div>
            <div class="productos">{{ $pedido->cantidades().' '.__('content.products')}}</div>
            <div class="valor">{{ __('content.currency') }} {{ $pedido->subtotal() }}</div>
            <a class="pagar" href="{{ route('clientes.preorden',$pedido) }}">{{ __('content.preorder') }}</a>
            <a class="seguir" href="{{ route('home') }}">{{ __('messages.shopcontinue') }}</a>
            <a class="cancelar" href="{{ route('pedidos.destroy',$pedido->id) }}">{{ __('content.cancel') }} {{ __('content.order') }}</a>
        </div>
    </div>

    
    
@endsection