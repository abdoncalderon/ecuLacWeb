                
@extends('layouts.external')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tienda.catalogo')}}">{{ __('content.catalog') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('content.product') }}</li>
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
    
    <div class="estante">

        {{-- IMAGENES DEL PRODUCTO --}}
        <div class="imagenes">
            <div class="otras">
                @foreach ($imagenes as $imagen)
                    <div id="imagenGaleria" class="imagen" style="background-image: url({{ asset('img/productos/'.$imagen->imagen) }})"></div>
                @endforeach
            </div>
            <div id="imagenPredeterminada" class="predeterminada" style="background-image: url({{ asset('img/productos/'.$imagenPredeterminada) }})">
                <div class="logo" style="background-image: url({{ asset('img/logos/ecolac1.png') }})" ></div>
            </div>
        </div>

        {{-- DETALLES DEL PRODUCTO --}}
        <div class="detalles">
            <div class="etiquetas">
                @if($producto->esDestacado==1)
                <p class="destacado">{{ __('content.highLight') }}</p>
                @endif
                <p class="{{ $producto->estado }}">{{ $producto->estado }}</p>
            </div>
            <p class="nombre">{{ $producto->nombre }}</p>
            <p class="categoria">{{ $producto->categoria($producto->categoria_id) }}</p>
            <p class="tipo">{{ $producto->tipo($producto->tipo_id) }}</p>
            <p class="descripcion">{{ $producto->descripcion }}</p>
            <p class="precio">US$ {{ $producto->precioDescuento($producto->id) }}</p>
            <p class="descuento">{{ $producto->descuento > 0 ? __('content.before').' US$ '.$producto->precioUnitario : '' }}</p>
        </div>

        {{-- OPCIONES DE COMPRA --}}
        <div class="pedido">
            <form method="POST" action="{{ route('itemspedidos.store') }}">
                @csrf
                <div class="datos">
                    <div class="{{ $producto->estado }}">{{ $producto->estado }}</div>
                    <div class="precio">US$ {{ $producto->precioDescuento($producto->id) }}</div>
                    <div class="unidades">(x 1 {{ __('content.unity') }})</div>
                </div>

                <div class="cantidad">
                    <div class="etiqueta">{{ __('content.quantity') }}</div>
                        <input 
                            class="valor" 
                            type="number"
                            min="1" 
                            name="cantidad" 
                            id="cantidad" 
                            autocomplete="off"
                            {{ $producto->estado!='Disponible' ? 'disabled' : '' }} 
                            onchange="document.getElementById('cantidadCompra').value=this.value"
                        >
                    <div class="existencia" {{ $producto->estado!='Disponible' ? 'hidden' : '' }}>{{ __('content.availables').' '.$producto->existenciaActual.' '.__('content.products') }}</div>
                </div>
                
                @if($producto->existenciaActual>0)
                    <div class="acciones">
                        <input hidden type="text" id="producto_id" name="producto_id" value="{{ $producto->id }}">
                        <input hidden type="text" id="cliente_id" name="cliente_id" value="{{ auth()->id() }}">
                        <button class="agregar" type="submit"><i class="fas fa-shopping-cart"></i>{{ ' '.__('messages.addToCart')}}</button>
                        <a class="comprar" href="{{ route('clientes.pedido') }}"><i class="fas fa-dollar-sign"></i>{{ ' '.__('messages.buyNow')}}</a>
                    </div>
                @endif
            </form>
        </div>
            
    </div>
    
@endsection

