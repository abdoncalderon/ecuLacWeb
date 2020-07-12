                
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
    
    <div class="estante">

        <div class="imagenes">
            <div class="otras">
                @foreach ($imagenes as $imagen)
                    <a href="#">
                        <div class="imagen" style="background-image: url({{ asset('img/productos/'.$imagen->imagen) }})"></div>
                    </a>
                @endforeach
            </div>
            <div class="predeterminada" style="background-image: url({{ asset('img/productos/'.$imagenPredeterminada) }})">
                <div class="logo" style="background-image: url({{ asset('img/ecolac3.png') }})" ></div>
            </div>
        </div>

        <div class="detalles">
            <div class="etiquetas">
                <p class="destacado">{{ $producto->esDestacado==1 ? __('content.highLight') : '' }}</p>
                <p class="{{ $producto->estado }}">{{ $producto->estado }}</p>
            </div>
            <p class="nombre">{{ $producto->nombre }}</p>
            <p class="categoria">{{ $producto->categoria($producto->categoria_id) }}</p>
            <p class="tipo">{{ $producto->tipo($producto->tipo_id) }}</p>
            <p class="descripcion">{{ $producto->descripcion }}</p>
            <p class="precio">US$ {{ $producto->precioDescuento($producto->id) }}</p>
            <p class="descuento">{{ $producto->descuento > 0 ? __('content.before').' US$ '.$producto->precioUnitario : '' }}</p>

        </div>

        <div class="pedido">
            <form method="POST" action="{{ route('itemspedidos.store',$producto) }}">
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
                            type="text" 
                            name="cantidad" 
                            id="cantidad" 
                            {{ $producto->existenciaActual<=0 ? 'disabled' : '' }} 
                            onchange="document.getElementById('cantidadCompra').value=this.value"
                        >
                    <div class="existencia">{{ __('content.availables').' '.$producto->existenciaActual.' '.__('content.products') }}</div>
                </div>
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif
                
                @if($producto->existenciaActual>0)
                    <div class="acciones">
                        <button class="agregar" type="submit" ><i class="fas fa-shopping-cart"></i>{{ ' '.__('messages.addToCart')}}</button>
                        <a class="comprar" href="{{ route('itemspedidos.index') }}"><i class="fas fa-dollar-sign"></i>{{ ' '.__('messages.buyNow')}}</a>
                    </div>
                @endif
            </form>
        </div>
            
    </div>
    
@endsection

