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
            
            <div class="orden">
                <p class="titulo">{{ __('messages.orderBy') }}</p>
                <select class="seleccion" name="orden" id="orden">
                    <option value="1">{{  __('messages.cheapexpensive') }}</option>
                    <option value="2">{{  __('messages.expensivecheap') }}</option>
                    <option value="2">{{  __('messages.ourHighlights') }}</option>
                </select>
            </div>
            <div class="categorias">
                <p class="titulo">{{ __('content.categories')}}</p>
                @foreach ($categorias as $categoria)
                    <a class="categoria" href="{{ route('tienda.filtroCategoria',['categoria'=>$categoria->categoria_id, 'busqueda'=> $busqueda]) }}">{{ $categoria->categoria($categoria->categoria_id) }}</a>
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
                            <div class="descuento">-{{ $producto->descuento }}%</div>
                        @endif
                    </div>
                    <div class="nombre"><p>{{ $producto->nombre }}</p></div>
                    <div class="acciones">
                        <a href="#">{{ __('content.buy')}}</a>
                        <a href="{{ route('tienda.estante',$producto) }}">{{ __('content.view')}}</a>
                    </div>
                    <div class="precio"><p>USD {{ $producto->precioUnitario }} x 1 {{ __('content.unity')}}</p></div>
                </article>
            @endforeach
           
            
        </div>

        

    </div>
    

@endsection
        






