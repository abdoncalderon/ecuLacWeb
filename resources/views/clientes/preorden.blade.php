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
<form method="POST" action="{{ route('pedidos.toPay', $pedido) }}">
    @csrf
    <div class="preorden">
        <div class="items">
            <div class="cabecera">
                <div class="cliente">
                    <p class="titulo">{{ __('content.data') }} {{ __('content.client') }}</p>
                    <p class="nombre">{{ $cliente->nombreCompleto }}</p>
                    <p class="identificacion">{{ $cliente->cedula }}</p>
                    <p class="email">{{ $cliente->email }}</p>
                </div>
                <div class="direccion">
                    <p class="titulo">{{ __('content.address') }} {{ __('content.delivery') }}</p>
                    <p class="calle">{{ $cliente->direccion }}</p>
                    <p class="ciudad">{{ $cliente->ciudad($cliente->ciudad_id) }}</p>
                    <p class="telefono">{{ $cliente->telefono }}</p>
                </div>
                <div class="pago">
                    <p class="titulo">{{ __('messages.payments') }}</p>
                    <div class="tipos">
                        <input 
                            class="efectivo" 
                            type="radio" 
                            id="efectivo" 
                            name="efectivo" 
                            value="EFECTIVO" 
                            checked 
                            onclick="document.getElementById('credito').checked = false;"
                        >
                        <label for="efectivo">{{ __('content.cash') }}</label><br>
                        <input 
                            class="credito" 
                            type="radio" 
                            id="credito" 
                            name="credito" 
                            value="CREDITO"
                            onclick="document.getElementById('efectivo').checked = false;"
                        >
                        <label for="credito">{{ __('content.credit') }}</label><br>
                    </div>
                </div>
            </div>
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
                        <div class="descuento">{{ __('content.discount') }} {{ __('content.currency') }} {{ $item->producto($item)->valorDescuento($item->producto_id) }}</div>
                        <div class="subtotal">{{ __('content.currency').' '.$item->producto($item)->precioDescuento($item->producto_id) }}</div>
                        <a class="eliminar" href="{{ route('itemspedidos.destroy',$item->id) }}">{{ __('content.delete') }}</a>
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
            
            <div class="total">{{ __('messages.valueToPay') }} {{ __('content.currency') }} {{ $pedido->total($pedido) }}</div>
            <button class="pagar" type="button" data-toggle="modal" data-target="#exampleModalCenter">{{ __('content.toOrder') }}</button>
            <a class="seguir" href="{{ route('home') }}">{{ __('messages.shopcontinue') }}</a>
            <a class="cancelar" href="{{ route('pedidos.destroy',$pedido->id) }}">{{ __('content.cancel') }} {{ __('content.order') }}</a>
        </div>
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('content.confirm') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('messages.confirmOrder') }}
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary ">{{ __('content.toOrder') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</form>
@endsection