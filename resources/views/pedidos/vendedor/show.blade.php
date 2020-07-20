@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pedidos.vendedor')}}">{{ __('content.order') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.show') }}</li>
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
                            <div>
                                <div class="estado">{{ $item->estado }}</div>
                                <div class="fecha">
                                    @switch($item->estado)
                                        @case('CONFIRMADO')
                                            {{ $item->fechaConfirmacion }}
                                            @break
                                        @case('DESPACHADO')
                                            {{ $item->fechaDespacho }}
                                            @break
                                        @default
                                            {{ $item->fechaEntrega }}
                                    @endswitch
                                </div>
                            </div>
                            <div class="cantidad">{{ __('content.quantity').': '.$item->cantidad.' '.__('content.unities') }}</div>
                        </div>
                        <div>
                            <div class="precio">{{ __('content.currency').' '.$item->precioUnitario }}</div>
                        </div>
                        
                    </article>
                @endforeach
            </div>
            <div class="resumen">
              
                <div class="titulo">{{ __('content.summary') }}</div>
                <div class="subtotal">
                    <div class="cantidad">Subtotal: {{ $pedido->cantidades($pedido->id) }} {{ __('content.products') }}</div>
                    <div class="precio">{{ __('content.currency') }} {{ $pedido->subtotal($pedido->id) }}</div>
                </div>

                <div class="impuesto">
                    <div class="tipo">{{ __('content.tax') }}:</div>
                    <div class="valor">{{ __('content.currency') }} {{ $pedido->valorIva($pedido->id) }}</div>
                </div>
                
                <div class="total">{{ __('messages.valuePaid') }} {{ __('content.currency') }} {{ $pedido->total($pedido) }}</div>
                <a class="regresar" href="{{ route('pedidos.vendedor') }}">{{ __('messages.backTo') }} {{ __('content.orders') }}</a>
            </div>
        </div>
    {{-- </div> --}}


    
@endsection