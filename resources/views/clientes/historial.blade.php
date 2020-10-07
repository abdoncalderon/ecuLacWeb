                
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

    {{-- MENSAJES DE ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $errors->first() }}
        </div>
    @endif

    {{-- ENCABEZADO --}}
    <div class="encabezado">

        <div class="resumen">
        </div>

        {{-- BUSCAR PEDIDO --}}
        <form method="GET" action="{{ route('clientes.historial') }}">
            <div class="filtros">
                <span class="boton">
                    <button class="btn btn-secondary" type="submit">{{ __('content.search') }} </button>
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
        {{-- PEDIDOS --}}
        @foreach ($pedidos as $pedido)

            {{-- PEDIDO --}}
            <div class="pedido">

                {{-- RESUMEN --}}
                <div class="resumido">
                    <div class="numeracion">{{ __('content.order')}} # {{ sprintf('%08d',$pedido->id) }}</div>
                    <div class="estado">{{ $pedido->estado }}</div>
                    @if($pedido->estado=='ABIERTO')
                        <div class="fecha">{{ Carbon\Carbon::parse($pedido->fechaCreacion)->format('d-M-Y') }}</div>
                        <div class="usuario">{{ __('content.client') }}: {{ $pedido->cliente->user->nombreCompleto ?? '' }}</div>
                    @elseif($pedido->estado=='CONFIRMADO')
                        <div class="fecha">{{ Carbon\Carbon::parse($pedido->fechaConfirmacion)->format('d-M-Y') }}</div>
                        <div class="usuario">{{ __('messages.soldBy') }} {{ $pedido->vendedor->nombreCompleto ?? '' }}</div>
                    @else
                        <div class="fecha">{{ Carbon\Carbon::parse($pedido->fechaCreacion)->format('d-M-Y') }}</div>
                        <div class="usuario">{{ __('messages.dispatchedBy') }} {{ $pedido->repartidor->nombreCompleto ?? '' }}</div>
                    @endif
                    <div class="total">Total: {{ $pedido->total() }}</div>
                </div>      
                              
                <div class="titulo">
                    <div class="orden">{{ __('content.items').' '.__('content.order').': '.count($pedido->items) }}</div>
                    <div class="precio"></div>
                    <div class="subtotal"></div>
                </div>

                {{-- ITEMS --}}
                <div class="items">
                    @foreach ($pedido->items as $item)
                        <article class="item">
                            <div class="imagen" style="background-image: url({{ asset('img/productos/'.$item->producto->imagenPredeterminada($item->producto_id)) }})"></div>
                            <div class="detalles">
                                <div>
                                    <div class="nombre">{{ $item->producto->nombre}}</div>
                                    <div class="descripcion">{{ $item->producto->descripcion}}</div>
                                </div>
                            </div>
                            <div class="estado">{{ $item->estado }} <br> {{ Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</div>
                            <div class="cantidad">{{ __('content.quantity') }} <br> {{ $item->cantidad }} {{ __('content.unities') }}</div>
                            <div class="precio">{{ __('content.price') }} ({{ __('content.discount') }}) <br> {{ __('content.currency').' '.$item->producto->precioDescuento() }}</div>
                            <div class="subtotal">{{ __('content.subtotal') }} <br> {{ __('content.currency') }} {{ $item->subtotal }}</div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    
@endsection