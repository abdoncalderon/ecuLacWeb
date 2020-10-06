@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pedidos.vendedor')}}">{{ __('content.orders') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.edit') }}</li>
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
    
    <div style="padding: 5px 10px; font-size: 1.5em;">{{ __('content.order') }} {{ $pedido->estado }} {{ $pedido->cliente->user->nombre }}</div>
    
        {{-- PEDIDO --}}
        <div class="pedido">
            <div class="items">
                <div class="titulo">
                    <div class="orden">{{ __('content.items').' '.__('content.order').': '.count($pedido->items) }}</div>
                    <div class="precio">{{ __('content.price').' x '.__('content.unity') }}</div>
                </div>

                {{-- ITEMS PEDIDO --}}
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
                            <a class="eliminar" href="{{ route('itemspedidos.destroy',$item->id) }}">{{ __('content.delete') }}</a>
                        </div>
                        
                    </article>
                @endforeach
            </div>

            {{-- RESUMEN --}}
            <div class="resumen">
                <div class="total">Subtotal</div>
                <div class="productos">{{ count($pedido->items).' '.__('content.products')}}</div>
                <div class="valor">{{ __('content.currency') }} {{ $pedido->subtotal() }}</div>
                <button type="button" class="agregar" data-toggle="modal" data-target="#agregarProductosModal">{{ __('content.add') }} {{ __('content.products') }}</button>
                <a class="seguir" href="{{ route('pedidos.destroy',$pedido->id) }}">{{ __('content.cancel') }} {{ __('content.order') }}</a>
            </div>
        </div>
    </div>

    {{-- VENTANA MODAL --}}
    <div class="modal fade" id="agregarProductosModal" tabindex="-1" role="dialog" aria-labelledby="agregarProductosModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                {{-- AGREGAR PRODUCTO A PEDIDO --}}
                <form method="POST" action="{{ route('itemspedidos.store') }}">
                    @csrf

                    {{-- ENCABEZADO --}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.products') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <input hidden type="text" id="cliente_id" name="cliente_id" value="{{ $pedido->cliente_id }}">

                    {{-- PRODUCTO --}}
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">ID {{ __('content.product') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="producto_id" 
                                    name="producto_id" 
                                    type="text" 
                                    maxlength="20"  
                                    class="form-control @error('nombre') is-invalid @enderror" 
                                    required 
                                    autofocus
                                    autocomplete="off">
                                @error('producto_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- CANTIDAD --}}
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('content.quantity') }}</label>
                            <div class="col-md-6">
                                <input 
                                    id="cantidad" 
                                    name="cantidad" 
                                    type="number" 
                                    min="1"
                                    class="form-control @error('nombre') is-invalid @enderror" 
                                    required 
                                    autofocus
                                    autocomplete="off">
                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        
                    {{-- PIE DE PAGINA --}}
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary ">{{ __('content.add') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection