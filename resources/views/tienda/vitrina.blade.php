@extends('layouts.external')

@section('contenidoPrincipal')

    <div class="vitrina">
        {{-- CARRUSEL DE IMAGENES --}}
        <div class="carrusel">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="imagen" src="{{ asset('img/carrusel/carrusel6.jpg') }}"  alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="imagen" src="{{ asset('img/carrusel/carrusel5.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="imagen" src="{{ asset('img/carrusel/carrusel7.jpg') }}" alt="">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
        <div class="titulo">
            <p><i class="fas fa-th"></i> {{ __('messages.ourCategories') }}</p>
                <a href="#">{{ __('messages.showAll')}}</a>
        </div>

        {{-- CATEGORIAS DE PRODUCTOS --}}
        <div class="categorias">
            @foreach ($categorias as $categoria)
                <article class="categoria">
                    <div class="nombre">{{ $categoria->nombre }}</div>
                    <div class="descripcion">{{ $categoria->descripcion }}</div>
                    <a href="{{ route('tienda.filtroCategoria',$categoria) }}">
                        <div class="imagen" style="background-image: url({{ asset('img/categorias/'.$categoria->imagen) }});"></div>
                    </a>
                </article>
            @endforeach
        </div>
        
        <div class="titulo">
            <p><i class="fas fa-medal"></i>  {{ __('messages.ourHighlights') }}</p>
            <a href="{{ route('tienda.filtroDestacados') }}">{{ __('messages.showAll')}}</a>
        </div>

        {{-- PRODUCTOS DESTACADOS --}}
        <div class="destacados">
            @foreach ($destacados as $destacado)
                <article class="destacado">
                    <div class="imagen" style="background-image: url({{ asset('img/productos/'.$destacado->imagenPredeterminada($destacado->id)) }})">
                        <div class="{{ $destacado->estado }}">{{ $destacado->estado }}</div>
                        @if($destacado->descuento>0)
                            <div class="descuento">-{{ number_format($destacado->descuento,0) }}%</div>
                        @endif
                    </div>
                    <div class="nombre"><p>{{ $destacado->nombre}}</p></div>
                    <div class="acciones">
                        @if($destacado->estado == 'Disponible')
                            <form method="POST" action="{{ route('itemspedidos.store') }}">
                                @csrf
                                <input hidden type="text" id="cantidad" name="cantidad" value="1">
                                <input hidden type="text" id="producto_id" name="producto_id" value="{{ $destacado->id }}">
                                <input hidden type="text" id="cliente_id" name="cliente_id" value="{{ auth()->id() }}">
                                <button class="comprar" type="submit">{{ __('content.buy') }} x 1</button>
                            </form>
                        @endif
                        <a class="ver" href="{{ route('tienda.estante',$destacado) }}">{{ __('content.view')}}</a>
                    </div>
                    <div class="precio"><p>USD {{ $destacado->precioUnitario }} x 1 {{ __('content.unity')}}</p></div>
                </article>
            @endforeach

        </div>

        <div class="titulo">
            <P>{{ __('content.contactus')}}</P>
        </div>

        {{-- INFORMACION CORPORATIVA --}}
        <div class="informacion">
            <div></div>
            <div></div>
            <div></div>
        </div>
        
    </div>
    
@endsection