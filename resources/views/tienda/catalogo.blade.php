@extends('layouts.external')

@section('indice')
    <div id="indice">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('content.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Catalogo</li>
            </ol>
        </nav>
    </div>
@endsection


@section('contenidoPrincipal')
    
    <div class="catalogo">

        <div class="resultados">
            <p class="totales">{{ count($productos) }} {{ __('content.results') }}</p>
            <div class="paginacion">
                {{ $productos->links() }}
            </div>
        </div>

        <div class="filtros">
            <form method="GET" action="{{ route('tienda.busqueda') }}">
                <div class="orden">
                    <p class="titulo">{{ __('messages.orderBy') }}</p>
                    <select class="seleccion" name="orden" id="orden" onchange="document.getElementById('submit').click()">
                        <option value="1" {{ $orden==1 ? 'selected' : '' }}>{{  __('messages.cheapexpensive') }}</option>
                        <option value="2" {{ $orden==2 ? 'selected' : '' }}>{{  __('messages.expensivecheap') }}</option>
                        <option value="3" {{ $orden==3 ? 'selected' : '' }}>{{  __('messages.ourHighlights') }}</option>
                    </select>
                    <input type="text" name="busqueda" hidden value="{{ $busqueda }}">
                    <input type="submit" id="submit" name="submit" hidden>
                </div>
            </form>
            <div class="categorias">
                <p class="titulo">{{ __('content.categories')}}</p>
                @foreach ($categorias as $categoria)
                    <a class="categoria" href="{{ route('tienda.filtroCategoria',['categoria'=>$categoria->categoria_id, 'busqueda'=> $busqueda, 'orden'=>$orden]) }}">{{ $categoria->categoria($categoria->categoria_id) }}</a>
                @endforeach
            </div>
            <div class="tipos">
                <p class="titulo">{{ __('content.types')}}</p>
                @foreach ($tipos as $tipo)
                    <a class="tipo" href="{{ route('tienda.filtroTipo',['tipo'=>$tipo->tipo_id, 'busqueda'=>$busqueda]) }}">{{ $tipo->tipo($tipo->tipo_id) }}</a>
                @endforeach
            </div>
            <div class="presentaciones">
                <p class="titulo">{{ __('content.presentations')}}</p>
                @foreach ($presentaciones as $presentacion)
                    <a class="presentacion" href="{{ route('tienda.filtroPresentacion',['presentacion'=>$presentacion->presentacion_id,'busqueda'=>$busqueda]) }}">{{ $presentacion->presentacion($presentacion->presentacion_id) }}</a>
                @endforeach
            </div>
            <a class="eliminar" href="{{ route('tienda.filtroBorrar')}}" class="borrar">{{ __('content.clean') }} {{ __('content.filter') }}</a>

        </div>

        <div class="productos">

            @foreach ($productos as $producto)
                <article class="producto">
                    <div class="imagen" style="background-image: url({{ asset('img/productos/'.$producto->imagenPredeterminada($producto->id)) }})">
                        <div class="{{ $producto->estado }}">{{ $producto->estado }}</div>
                        @if( $producto->descuento>0 )
                            <div class="descuento">-{{ number_format($producto->descuento,0) }}%</div>
                        @endif
                    </div>
                    <div class="nombre"><p>{{ $producto->nombre }}</p></div>
                    <div class="acciones">
                        @if($producto->estado == 'Disponible')
                        <form method="POST" action="{{ route('itemspedidos.store') }}">
                            @csrf
                            <input hidden type="text" id="cantidad" name="cantidad" value="1">
                            <input hidden type="text" id="producto_id" name="producto_id" value="{{ $producto->id }}">
                            <input hidden type="text" id="cliente_id" name="cliente_id" value="{{ auth()->id() }}">
                            <button class="comprar" type="submit">{{ __('content.buy') }} x 1</button>
                        </form>
                        @endif
                        <a class="ver" href="{{ route('tienda.estante',$producto) }}">{{ __('content.view')}}</a>
                    </div>
                    <div class="precio"><p>USD {{ $producto->precioUnitario }} x 1 {{ __('content.unity')}}</p></div>
                </article>
            @endforeach
           
            
        </div>

        

    </div>
    

@endsection
        






