@extends('layouts.internal')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pedidos.index',$vista)}}">{{ $vista }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.edit') }}</li>
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
                            <a class="eliminar" href="{{ route('itemspedidos.destroy',$item->id) }}">{{ __('content.delete') }}</a>
                        </div>
                        
                    </article>
                @endforeach
            </div>
            <div class="resumen">
                <div class="total">Total</div>
                <div class="productos">{{ count($itemsPedido).' '.__('content.products')}}</div>
                <div class="valor">{{ __('content.currency') }} {{ $pedido->total($pedido) }}</div>
                <button type="button" class="agregar" data-toggle="modal" data-target="#agregarProductosModal">{{ __('content.add') }} {{ __('content.products') }}</button>
                <a class="seguir" href="{{ route('pedidos.destroy',$pedido->id) }}">{{ __('content.cancel') }} {{ __('content.order') }}</a>
            </div>
        </div>
    </div>


    <div class="modal fade" id="agregarProductosModal" tabindex="-1" role="dialog" aria-labelledby="agregarProductosModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('itemspedidos.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.products') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <input hidden type="text" id="cliente_id" name="cliente_id" value="{{ $pedido->cliente_id }}">

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