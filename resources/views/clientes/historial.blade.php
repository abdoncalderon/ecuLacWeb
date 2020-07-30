                
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
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $errors->first() }}
        </div>
    @endif
    <div class="encabezado">
        <div class="resumen">
           
        </div>
        <form method="GET" action="{{ route('clientes.historial') }}">
            <div class="filtros">
                <span class="boton">
                    <button class="btn btn-secondary" type="submit">{{ __('content.search') }}  {{ __('content.order') }}</button>
                </span>
                <div class="etiqueta">{{ __('content.status') }}</div>
                <select class="select" name="estado" id="estado">
                    <option value="">{{ __('content.all') }}</option>
                    <option value="1">{{ __('content.open') }}</option>
                    <option value="2">{{ __('content.confirmed') }}</option>
                    <option value="3">{{ __('content.dispatched') }}</option>
                    <option value="4">{{ __('content.delivered') }}</option>
                </select>
                <div class="etiqueta">{{ __('content.from') }}</div>
                <input class="date" type="date" id="desde" name="desde" value="{{ Carbon\Carbon::now()->toDateString() }}" min="1900-01-01" max="2999-12-31">
                <div class="etiqueta">{{ __('content.To') }}</div>
                <input class="date" type="date" id="hasta" name="hasta" value="{{ Carbon\Carbon::now()->toDateString() }}" min="1900-01-01" max="2999-12-31">
            </div>
        </form>
    </div>
    <div class="historial">
        @foreach ($pedidos as $pedido)
            <div class="pedido">
                <div class="resumido">
                    <div class="numeracion">{{ __('content.order')}} # {{ sprintf('%08d',$pedido->id) }}</div>
                    <div class="estado">{{ $pedido->estado }}</div>
                    @if($pedido->estado=='ABIERTO')
                        <div class="fecha">{{ Carbon\Carbon::parse($pedido->fechaCreacion)->format('d-M-Y') }}</div>
                        <div class="usuario">{{ __('content.client') }}: <br> {{ $pedido->cliente($pedido->cliente_id) ?? '' }}</div>
                    @elseif($pedido->estado=='CONFIRMADO')
                        <div class="fecha">{{ Carbon\Carbon::parse($pedido->fechaConfirmacion)->format('d-M-Y') }}</div>
                        <div class="usuario">{{ __('messages.soldBy') }} <br> {{ $pedido->repartidor($pedido->vendedor_id) ?? '' }}</div>
                    @else
                        <div class="fecha">{{ Carbon\Carbon::parse($pedido->fechaCreacion)->format('d-M-Y') }}</div>
                        <div class="usuario">{{ __('messages.dispatchedBy') }}  <br>  {{ $pedido->repartidor($pedido->repartidor_id) ?? '' }}</div>
                    @endif
                    <div class="total">Total: {{ $pedido->total($pedido) }}</div>
                </div>      
                              
                <div class="titulo">
                    <div class="orden">{{ __('content.items').' '.__('content.order').': '.count($pedido->items($pedido->id)) }}</div>
                    <div class="precio"></div>
                    <div class="subtotal"></div>
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
                            <div class="estado">{{ $item->estado }} <br> {{ Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</div>
                            <div class="cantidad">{{ __('content.quantity') }} <br> {{ $item->cantidad }} {{ __('content.unities') }}</div>
                            <div class="precio">{{ __('content.price') }} ({{ __('content.discount') }}) <br> {{ __('content.currency').' '.$item->producto($item)->precioDescuento($item->producto_id) }}</div>
                            <div class="subtotal">{{ __('content.subtotal') }} <br> {{ __('content.currency') }} {{ $item->subtotal }}</div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    
@endsection